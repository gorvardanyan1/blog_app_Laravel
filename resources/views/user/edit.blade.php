@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
            </div>
            <div>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }} " disabled>
            </div>
            <div>
                <input type="file" name="profile_image" id="users_profile">
            </div>
            <div>
                <input type="submit" value="Edit">
            </div>
        </form>

    </div>
@endsection
