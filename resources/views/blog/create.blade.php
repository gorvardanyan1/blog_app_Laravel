@extends('layouts.app')
@section('content')
    <form action="/blogs/store" method="post" id="createForm">
        @csrf
        <div>
            <input type="text" name="title" id="title" placeholder="Title">

        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
        </div>
        <button>Add Blog</button>
    </form>
@endsection
