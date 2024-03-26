@extends('layouts.app')
@section('content')
    <div class="showContainer">
        <a href="/blogs"><-Back</a>
                <div>
                    <i>Title:</i>
                    <h2 class="blogTitle">{{ $blog->title }}</h2>
                </div>

                <h5>{{ $blog->created_at }}</h5>
                <p class="description">{{ $blog->description }}</p>

                <div>
                    @include('blog.comment')
                </div>
    </div>
@endsection
