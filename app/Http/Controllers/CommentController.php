<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {

        $comment = new Comment();
        $comment->content = request()->get('content');
        $comment->blog_id = $blog->id;
        $comment->save();
        return redirect('/blogs')->with('mssg', 'Comment added');
    }
}
