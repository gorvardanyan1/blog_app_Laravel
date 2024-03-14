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
                    <p>{{ $comment->content }}</p>
                    <input type="image" src="/images/cancel.png" alt="Cencel">
                </form>
            </div>
        @endforeach
    </div>
</div>
