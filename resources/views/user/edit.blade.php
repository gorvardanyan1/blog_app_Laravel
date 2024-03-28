@extends('layouts.app')
@section('content')
    <div>
        <div class="profileContainer">
            <div>
                <img src="{{ !is_null(Auth::user()->profile_image) ? asset('storage/' . Auth::user()->profile_image) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=338&ext=jpg&ga=GA1.1.2082370165.1711238400&semt=ais' }}"
                    alt="Profile" loading="lazy" id="previewImage">
            </div>

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
                    <textarea name="bio" id="bio" cols="30" rows="10" >{{ Auth::user()->bio}}</textarea>
                </div>
                <div>
                    <input type="submit" value="Edit">
                </div>
            </form>
        </div>

        <script>
            function previewImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        document.getElementById('previewImage').setAttribute('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            document.getElementById('users_profile').addEventListener('change', function() {
                previewImage(this);
            });
        </script>
    </div>
@endsection
