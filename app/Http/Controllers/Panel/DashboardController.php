<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $commentsCount = Comment::count();
        $categoriesCount = Category::count();
        return \view('panel.index', \compact(['usersCount', 'postsCount', 'commentsCount', 'categoriesCount']));
    }
}
