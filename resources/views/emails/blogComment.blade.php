<h2>你有新的留言</h2>

<h3>{{ $comment->user->name }} 對您的文章 [{{ $comment->blog->title }}] 發表了新的留言</h3>

<div>
    {{ $comment->content }}
</div>
