<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function dashboard(){

        $record_count = Post::all()->count();
        $driver_count = User::where('is_admin', '!=', 1)->count();

        return view('admin.dashboard', compact('driver_count','record_count'));
    }

    public function all() {

        $posts = Post::latest()->with('user')->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
