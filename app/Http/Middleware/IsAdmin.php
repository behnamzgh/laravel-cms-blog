<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    // shart mizarim k user agar admin nabod abort kone va payam neshon bede b karbar
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role !== 'admin'){
            \abort(403, 'نقش کاربری شما دسترسی به این قسمت ندارد');
        }
        return $next($request);
    }
}
