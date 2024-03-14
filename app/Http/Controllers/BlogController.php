<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckBlogOwnership;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckBlogOwnership::class)->only(['edit',  'update', 'destroy']);
    }

    public function index()
    {
        $blogs = Blog::latest();

        if (request()->has('search')) {
            $blogs =  $blogs->where('title', 'like', '%' . request('search') . '%');
        }

        return view('blog.blogs', ["blogs" => $blogs->get()]);
    }
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        // dd($blog->comments);

        return view('blog.show', ["blog" => $blog]);
    }
    public function create()
    {
        return view('blog.create');
    }
    public function store()
    {
        request()->validate([
            'title' => 'required|min:3|max:40',
            'description' => 'required|min:10|max:1000000'
        ]);

        $blog = new Blog();
        $blog->title = request('title');
        $blog->description = request('description');
        $blog->user_id = auth()->id();
        $blog->save();
        return redirect('/blogs')->with('mssg', 'Blog Created');
    }
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('/blogs')->with("mssg", "Blog Deleted");
    }
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', ['blog' => $blog]);
    }
    public function update($id)
    {
        request()->validate([
            'title' => 'required|min:3|max:40',
            'description' => 'required|min:10|max:300'
        ]);

        $blog = Blog::findOrfail($id);
        $blog->update([
            'title' => request('title'),
            'description' => request('description')
        ]);
        return redirect('/blogs')->with('mssg', 'Blog Updated');
    }
}
