<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {

        $validatedData = request()->validate([
            'content' => 'required|string|min:1|max:255',
        ]);

        // $comment = new Comment();
        // $comment->content = request()->get('content');
        // $comment->blog_id = $blog->id;
        // $comment->save();
        Comment::create(
            [
                'content' => $validatedData['content'],
                'blog_id' => $blog->id,
                'user_id' => auth()->id()
            ]
        );

        return redirect('/blogs')->with('mssg', 'Comment added');
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect('/blogs')->with('mssg', "Comment Deleted");
    }
}
