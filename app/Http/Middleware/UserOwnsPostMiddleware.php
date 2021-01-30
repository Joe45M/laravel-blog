<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOwnsPostMiddleware
{
    /**
     * Ensure the user owns the current post.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = Auth::id();
        $post = Post::where('user_id', $user)->where('id', $request->post)->first();

        if(!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        return $next($request);
    }
}
