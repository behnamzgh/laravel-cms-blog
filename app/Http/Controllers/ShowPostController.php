<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ShowPostController extends Controller
{
    public function index(Post $post)
    {
        $post->load(['user','categories','comments' => function($query){
            return $query->where('comment_id', null);
        }])->loadCount('comments');

        // \dd($post->toArray());
        return \view('post', \compact('post'));
    }
}
