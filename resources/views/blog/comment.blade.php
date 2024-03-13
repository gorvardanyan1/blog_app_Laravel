<div class="commentsComponent">
    <form action="{{ route('blogs.comments.store', $blog->id) }}" method="post">
        @csrf
        <input type="text" name="content" id="commentTextArea" placeholder="Comment ...">
        <input type="submit" value="Add Comment">
    </form>
    <div class="commentsDiv">
        @foreach ($blog->comments as $comment)
            <p>{{ $comment->content }}</p>
        @endforeach
    </div>
</div>
