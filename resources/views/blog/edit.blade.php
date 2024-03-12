@extends('layouts.app')
@section('content')
    <form action="/blogs/{{ $blog->id }}" method="post" id="createForm">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="title" id="title" placeholder="Title" value="{{ $blog->title }}">

        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description">{{ $blog->description }}</textarea>
        </div>
        <button>Add Blog</button>
    </form>
@endsection
