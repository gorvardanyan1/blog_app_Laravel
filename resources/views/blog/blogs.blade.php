@extends('layouts.app')

@section('content')
    <div class="alert">
        {{ session('mssg') }}
        <span style="color: red">{{ session('error') }}</span>
    </div>

    <div class="blogsContainer">
        @include('blog.searchBar')
        <a href="/blogs/create">Add Blog</a>
        @foreach ($blogs as $blog)
            <div class="blog">

                <div class="title">
                    <i>Title:</i>
                    <h3>{{ $blog->title }}</h3>
                </div>
                <div class="description">
                    <i>Description:</i>
                    <p>
                        {{ $blog->description }}
                    </p>

                </div>
                @include('blog.comment')
                <a href="/blogs/{{ $blog->id }}">See Blog</a>
                <a href="/blogs/edit/{{ $blog->id }}">Edit</a>
                <form action="/blogs/{{ $blog->id }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </div>
        @endforeach
    </div>
@endsection
