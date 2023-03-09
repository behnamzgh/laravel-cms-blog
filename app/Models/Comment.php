<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    // inja migim baraye har commenti k darim biad replies hash ham load kone baraye namayesh
    // comment haye to dar to zire har post
    protected $with = ['approvedReplies'];

    // relation baraye namayesh etellate nevisande user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relation baraye namayesh etellate title post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // relation namayesh etelaate tedade reply roye har comment
    public function replies()
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedReplies()
    {
        return $this->replies()->where('status', true);
    }

    public function get_status()
    {
        return !! $this->status
                    ? 'تایید شده'
                    : 'تایید نشده';
    }

    // function tabdil tarikh miladi b jalali
    public function jalali_created_at()
    {
        return verta($this->created_at)->format('Y/m/d');
    }
    public function jalali_updated_at()
    {
        return verta($this->updated_at)->format('Y/m/d');
    }
}
