@extends('layouts.app')
@section('content')
    <div class="profileContainer">
        <div>
            <img src="{{ $user->profileImage != 0 ? asset('storage/' . $user->profileImage) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=338&ext=jpg&ga=GA1.1.2082370165.1711238400&semt=ais' }}"
                alt="Profile" loading="lazy">
        </div>
        <div>
            <h2>{{ $user->name }}</h2>
            <h4>{{ $user->email }}</h4>
            <h6>{{ $user->created_at }}</h6>
            <a href="/user/edit">Edit</a>
        </div>


    </div>
    <div class="blogsContainer">
        <a href="/blogs/create">Add Blog</a>
        @foreach ($user->blogs as $blog)
            <div class="blog">
                <img class="blogAuthorProfileImage" src="{{ asset('storage/' . $blog->user->profileImage) }}" loading="lazy" alt="">
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
