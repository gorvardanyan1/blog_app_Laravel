@extends('layouts.app')
@section('content')
    <div class="profileContainer">
        <div>
            <img src="{{ $user->profile_image != 0 ? asset('storage/' . $user->profile_image) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=338&ext=jpg&ga=GA1.1.2082370165.1711238400&semt=ais' }}"
                alt="Profile" loading="lazy">
        </div>
        <div>
            <h2>{{ $user->name }}</h2>
            <h4>{{ $user->email }}</h4>
            <h6>{{ $user->created_at }}</h6>
            <p>{{ $user->bio }}</p>
            <a href="/user/edit">Edit</a>
        </div>


    </div>
    <div class="blogsContainer">
        <a href="/blogs/create">Add Blog</a>
        @foreach ($user->blogs as $blog)
            <div class="blog">
                <img class="blogAuthorProfileImage"
                    src="{{ is_null($blog->user->profile_image != 0) ? asset('storage/' . $blog->user->profile_image) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=338&ext=jpg&ga=GA1.1.2082370165.1711238400&semt=ais' }}">
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
