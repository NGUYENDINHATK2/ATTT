<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['user'] = User::where('id', auth()->user()->id)->first();
        $data['posts'] = Post::orderBy('created_at', 'desc')->take(5)->get();
        foreach ($data['posts'] as $post) {
            $post->user = User::where('id', $post->user_id)->first();
        }
        return view('home', ['data' => $data]);
    }
}
