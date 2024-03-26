<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckBlogOwnership;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckCommentOwnership;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckCommentOwnership::class)->only(['destroy']);
    }

    public function store(Blog $blog)
    {

        $validatedData = request()->validate([
            'content' => 'required|string|min:1|max:255',
        ]);

        Comment::create(
            [
                'content' => $validatedData['content'],
                'blog_id' => $blog->id,
                'user_id' => auth()->id()
            ]
        );

        // return redirect('/blogs')->with('mssg', 'Comment added');
        return back();
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('mssg', "Comment Deleted");
    }
}
