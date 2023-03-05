<?php

namespace App\Http\Controllers\Panel;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with(['user','post'])->withCount('replies')->paginate();
        return \view('panel.comments.index', \compact('comments'));
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'status' => ! $comment->status
        ]);

        \session()->flash('status', 'وضعیت نمایش نظر تغییر کرد');
        return \back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        \session()->flash('status', 'نظر به درستی حذف شد');
        return \back();
    }
}
