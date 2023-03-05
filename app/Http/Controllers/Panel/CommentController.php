<?php

namespace App\Http\Controllers\Panel;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->approved)){
            // faghat on comment haii k parametri k az url ba route ersal shode yani approved to where zir barabar bashe ba status to DB ro namayesh mide
            $comments = Comment::where('status', $request->approved)->with(['user','post'])->withCount('replies')->paginate();
        }else{
            $comments = Comment::with(['user','post'])->withCount('replies')->paginate();
        }
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
