@extends('layouts.app')

@section('title') Show Post @endsection

@section('content')

<!--Post Info Section-->
<div class="card my-5">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Title: {{$post->title}}</h5>
        <p class="card-text fs-6"><b>Description: </b> {{$post->description}}</p>
        @if($post->image_path)
            <img src="{{Storage::url($post->image_path)}}"  alt="{{$post->image_path}}">
        @endif
    </div>
</div>

<!--Post Creator Info Section-->
<div class="card mt-6">
    <div class="card-header">
        Post Creator Info
    </div>
    <div class="card-body">
        <p class="card-text fs-6"><b>Name: </b> {{$post->user->name}}</p>
        <p class="card-text fs-6"><b>Email: </b> {{$post->user->email}}</p>
        <p class="card-text fs-6"><b>Created At: </b> {{$post->created_at->format('l jS F Y h:i:s A')}}</p>
        @if($post->updated_at)
            <p class="card-text fs-6"><b>Updated At: </b> {{$post->updated_at->format('l jS F Y h:i:s A')}}</p>
        @endif
    </div>
</div>

<!--Comments Section-->
<div class="card my-5">
    <div class="card-header">
        Comments
    </div>

    @foreach ($comments as $comment)
    <div class="card m-3 col-8">
        <div class="card-body">
            <span class="fw-bold">{{ $post->user->name }}</span>
            <span class="text-muted pl-4">{{ $comment->created_at->format('20y/m/d') }}</span>
            <p class="card-text fs-6 mt-2">{{ $comment->comment }}</p>
        </div>
    </div>
    @endforeach

    <form method="POST" action="{{ route('comments.store', $post->id) }}">
        @csrf
        <div class="mb-3 mt-2">
            <h3>
                <textarea class="form-control m-3 col-8" placeholder="Enter Your Comment" name="comment"
                    style="height:80px;"></textarea>
            </h3>
        </div>
        <button type="submit" class=" btn btn-outline-success m-3">Comment</button>
    </form>
</div>

@endsection
