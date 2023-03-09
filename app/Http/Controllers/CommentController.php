<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id; //id karbari k comment dare minevise baraye zakhire to DB va badan namayesh esme on to nazarat
        // \dd($data);
        Comment::create($data);
        \session()->flash('status', 'نظر شما ثبت شد و پس از تایید نمایش داده میشود');
        return \back();
    }
}
