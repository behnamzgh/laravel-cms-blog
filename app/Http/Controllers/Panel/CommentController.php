<?php

namespace App\Http\Controllers\Panel;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        return \view('panel.comments.index');
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
