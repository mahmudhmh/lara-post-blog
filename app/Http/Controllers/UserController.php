<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->paginate(10);
        return view('users.index', compact('users'));
    }
}
