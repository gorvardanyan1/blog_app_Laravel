<div class="commentsComponent">
    <h3>Comments</h3>
    <form action="{{ route('blogs.comments.store', $blog->id) }}" method="post">
        @csrf
        <input type="text" name="content" id="commentTextArea" placeholder="Comment ...">
        <input type="submit" value="Add Comment">
    </form>
    <div class="commentsDiv">
        @foreach ($blog->comments as $comment)
            <div>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                    @method('DELETE')
                    @csrf

                    <p>
                        <img src="{{ !is_null($comment->user->profile_image) ? asset('storage/' . $comment->user->profile_image) : 'https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=338&ext=jpg&ga=GA1.1.2082370165.1711238400&semt=ais' }}"
                            alt="Profile Image" class="commentsAutorImage">

                        <i>{{ $comment->user->name }}</i>: {{ $comment->content }}
                    </p>
                    @if ($comment->user_id == auth()->id())
                        <input type="image" src="/images/cancel.png" alt="Cencel">
                    @endif

                </form>
            </div>
        @endforeach
    </div>
</div>
