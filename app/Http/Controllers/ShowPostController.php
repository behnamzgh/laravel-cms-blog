<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ShowPostController extends Controller
{
    public function index(Request $request, Post $post)
    {
        $post = Post::find($request->id);
        return \view('post', \compact('post'));
    }
}
