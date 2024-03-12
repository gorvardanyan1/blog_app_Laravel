@extends('layouts.app')
@section('content')
    <div class="showContainer">
        <a href="/blogs"><-Back</a>
                <div>
                    <i>Title:</i>
                    <h2>{{ $blog->title }}</h2>
                </div>

                <h5>{{ $blog->created_at }}</h5>
                <p>{{ $blog->description }}</p>
    </div>
@endsection
