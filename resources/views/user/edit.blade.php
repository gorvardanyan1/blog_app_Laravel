@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('user.update') }}" method="post">
            @csrf
            @method("PUT")
            <div>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
            </div>
            <div>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }} " disabled>
            </div>
            <div>
                <input type="submit" value="Edit">
            </div>
        </form>

    </div>
@endsection
