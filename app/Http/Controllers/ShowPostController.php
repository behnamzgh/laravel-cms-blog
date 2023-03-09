<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ShowPostController extends Controller
{
    public function index(Post $post)
    {
        $post->load(['user','categories','comments' => function($query){
            // query baraye vaghti ham comment zir majmoe nabod(comment_id null bod) va vaziatesh ham taeed shode bod
            return $query->where('comment_id', null)->where('status', true);
        }])->loadCount('comments');

        // \dd($post->toArray());
        return \view('post', \compact('post'));
    }
}
