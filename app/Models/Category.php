<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
    ];

    // rabete har parent ba child hash yek b chande
    // yani har child faghat mitone yek parent dashte bashe
    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // rabete har child ba parent chand b yeke yani
    // har parent mitone koli child zir majmoe khodesh dashte bashe
    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function getParentName()
    {
        return \is_null($this->parent) ? 'ندارد' : $this->parent->name;
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
