@extends('layouts.app')

@section('content')
    <div class="alert">
        {{ session('mssg') }}
        <span style="color: red">{{ session('error') }}</span>
    </div>

    {{-- @include('user.user') --}}

    <div class="blogsContainer">
        @include('blog.searchBar')
        <a href="/blogs/create">Add Blog</a>
        @foreach ($blogs as $blog)
            <div class="blog">

                <img class="blogAuthorProfileImage"
                    src="{{ !is_null($blog->user->profile_image) ? asset('storage/' . $blog->user->profile_image) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=338&ext=jpg&ga=GA1.1.2082370165.1711238400&semt=ais' }}"
                    alt="Profile Image">
                <a href="{{ route('user.show', $blog->user->id) }}">{{ $blog->user->name }}</a>
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
                <a href="/blogs/{{ $blog->id }}">See Blog</a>


            </div>
        @endforeach
    </div>
@endsection
