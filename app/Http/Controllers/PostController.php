<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Auth\Access\AuthorizationException;
use Laravel\Socialite\Facades\Socialite;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class PostController extends Controller
{
    public function index()
{
    $allPosts = Post::withTrashed()->paginate(5);
    return view('post.index', ['posts' => $allPosts,]);

}


    public function show($post)
    {
        $post =  Post::find($post);
        $comments = $post->comments;
        return view('post.show', ['post' => $post,'comments' => $comments]);
    }

    public function create()
    {
        $users = User::all();
        return view('post.create',['users' => $users]);
    }

    public function store(StorePostRequest $request)
{
    $user = Auth::user();

    $post = $user->posts()->create([
        'title' =>  $request->title,
        'description' => $request->description,
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $path = Storage::putFileAs('public/posts', $image, $filename);
        $post->image_path = $path;
        $post->save();
    }

    return redirect()->route('posts.index')->with('success', 'A Post is Created Successfully!');
}


    public function edit($post)
    {
        $users = User::all();
        $post = Post::find($post);

        return view('post.edit', ['post' => $post,'users' => $users]);
    }

    public function update($postId, StorePostRequest $request)
    {
        $post = Post::findOrFail($postId);

        if ($post->user_id !== Auth::id()) {
            throw new AuthorizationException('You are not authorized to update this post.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            if ($post->image_path && Storage::exists($post->image_path)) {
                Storage::delete($post->image_path);
            }

            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = Storage::putFileAs('public/posts', $image, $filename);
            $post->image_path = $path;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

public function delete($postId)
{
    $post = Post::findOrFail($postId);

    if ($post->user_id !== Auth::id()) {
        throw new AuthorizationException('You are not authorized to delete this post.');
    }

    if ($post->image_path && Storage::exists($post->image_path)) {
        Storage::delete($post->image_path);
    }
    $post->delete();

    return redirect()->back()->with('success', 'A Post is Deleted Successfully!');
}
    // public function delete($post)
    // {

    //     $post = Post::findOrFail($post);
    //     if ($post->image && Storage::exists($post->image)) {
    //         Storage::delete($post->image);
    //     }
    //     $post->delete();
    //     return redirect()->back()->with('success', 'A Post is Deleted Successfully!');;
    // }

    public function restore($post)
    {
        $post = Post::withTrashed()->find($post);
        $post->restore();
        return redirect()->back()->with('success', 'A Post is Restored Successfully!');;
    }

    public function githubredirect(Request $request)
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubcallback(Request $request)
    {
        $userdata = Socialite::driver('github')->user();
        $user = User::where('email', $userdata->email)->where('auth_type','github')->first();
        if (!$user) {
            $uuid=Str::uuid()->toString();
            $user = new User();
            $user->name = $userdata->name;
            $user->email = $userdata->email;
            $user->password = Hash::make($uuid.now());
            $user->auth_type = 'github';
            try {
                $user->save();
            } catch (\Illuminate\Database\QueryException $exception) {
                return redirect('/login')->with('error', 'Duplicate Email Address !');
            }
            Auth::login($user);
            }

        else{
            Auth::login($user);
        }
        return redirect('/home');
    }

    public function googleredirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback(Request $request)
    {
        $userdata = Socialite::driver('google')->user();
        $user = User::where('email', $userdata->email)->where('auth_type','google')->first();
        if (!$user) {
            $uuid=Str::uuid()->toString();
            $user = new User();
            $user->name = $userdata->name;
            $user->email = $userdata->email;
            $user->password = Hash::make($uuid.now());
            $user->auth_type = 'google';
            try {
                $user->save();
            } catch (\Illuminate\Database\QueryException $exception) {
                return redirect('/login')->with('error', 'Duplicate Email Address !');
            }
            Auth::login($user);
            }

        else{
            Auth::login($user);
        }
        return redirect('/home');
    }

    public function removeOldPosts()
    {
        PruneOldPostsJob::dispatch();
    }
}
