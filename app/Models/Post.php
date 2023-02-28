<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'banner',
        'content',
        'user_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
