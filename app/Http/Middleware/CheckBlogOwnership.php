<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Blog;

class CheckBlogOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $blogId = $request->route('id');
        $blog = Blog::findOrFail($blogId);
        if ($blog->user_id != auth()->id()) {
            return redirect('/blogs')->with("error", 'Unauthorized User');
        }

        return $next($request);
    }
}
