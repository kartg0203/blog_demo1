@extends('layouts.app')

@section('title', '文章標題')

@section('header')
    @include('layouts.header',
    ['img' => '/assets/img/post-bg.jpg',
    'heading' => "【".$blog->category->name."】" . $blog->title,
    'view' => $blog->view,
    'comment' => $blog->comments()->count(),
    'subheading' => $blog->created_at->format('Y年 m月 d日') . ""])
@endsection

@section('content')
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-8">
                    @include('components.success')
                    @include('components.warning')
                    {!! nl2br($blog->content) !!}
                    <p class="d-flex">
                        作者：{{ $blog->user->name }}
                        @if (auth()->id() == $blog->user_id)
                            <span class="ms-5">
                                <a href="{{ route('blogs.edit', $blog) }}"
                                    class="btn btn-sm btn-outline-primary rounded">編輯</a>
                            </span>
                        @endif
                    </p>
                </div>
                <div class="col-md-3 border text-center h-100 py-3">
                    <h5 class="category-title">
                        {{ $blog->category->name }}
                    </h5>
                    <p class="">
                        所有跟{{ $blog->category->name }}相關的文章
                    </p>
                    <hr>
                    <div class="d-grid">
                        <a href="{{ route('index', ['category_id' => $blog->category]) }}"
                            class="btn btn-primary btn-sm btn-block rounded">
                            文章數量：{{ $blog->category->blogs()->count() }}
                        </a>
                    </div>
                </div>
                {{-- 所有留言 --}}
                <div class="row my-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                留言
                            </div>
                            {{-- <div class="card-body"> --}}
                            <ul class="list-group list-group-flush" id="comment-list">
                                @forelse ($comments as $comment)
                                    <li class="list-group-item d-flex pt-3 pb-4">
                                        <div class="imgBox">
                                        <img style="width: 55px;height: 55px;" src="@if ($comment->user->avatar) {{ asset('storage/' . $comment->user->avatar) }} @else
                                            https://fakeimg.pl/250x100/ @endif"
                                            class="rounded-circle me-4">
                                        </div>
                                        <div class="comment-body">
                                            <h5>{{ $comment->user->name }}
                                                <span
                                                    class="fs-6 text-muted fw-normal ps-2">{{ $comment->updated_at }}</span>
                                            </h5>
                                            {{ $comment->content }}
                                        </div>
                                    </li>
                                    {{-- <div class="comment border-bottom py-4 d-flex">
                                    <img style="width: 55px;height: 55px;" src="@if ($comment->user->avatar) {{ asset('storage/' . $comment->user->avatar) }} @else
                                        https://fakeimg.pl/250x100/ @endif"
                                        class=" rounded-circle">
                                        <div class="comment-body ms-4">
                                            <h5>{{ $comment->user->name }}</h5>
                                            {{ $comment->content }}
                                        </div>
                                    </div> --}}
                                @empty
                                    <div id="empty" class="text-center text-muted py-5">暫無留言</div>
                                @endforelse
                            </ul>
                            {{-- </div> --}}
                        </div>
                        <div class="mt-3 d-flex justify-content-center">{{ $comments->links() }}</div>
                    </div>
                </div>
                {{-- 回復 --}}
                <div class="row">
                    <div class="col-md-8">
                        @guest
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert-warning p-2">
                                        你還沒有登錄，請登入
                                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm rounded">馬上登入</a>
                                    </div>
                                </div>
                            </div>
                        @endguest
                        @auth
                            <div class="card">
                                @include('components.warning')
                                <div class="card-body">
                                    <textarea name="content" id="content" cols="30" rows="5" class="form-control"></textarea>
                                    <div id="invalid-feedback" class="invalid-feedback">
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button id="btn-comment" type="button" class="btn btn-primary btn-sm">送出</button>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection

@section('script')
<script>
    // alert("stest");
    /**
     * 原生寫法
     */
    const btn = document.getElementById('btn-comment');
    const comment_list = document.getElementById('comment-list');
    const content = document.getElementById('content');
    const empty = document.getElementById('empty');
    if (btn) {
        btn.addEventListener('click', () => {
            // console.log('{{ route('index') }}');
            // console.log(document.getElementById('content').value);
            axios.post('{{ route('blogs.comment', $blog) }}', {
                    content: document.getElementById('content').value,
                })
                .then(res => {
                    if (res.data.state) {
                        const user_name = res.data.data['user_name'];
                        const user_avatar = res.data.data['user_avatar'];
                        const comment = res.data.data['comment_content'];
                        const time = res.data.data['comment_time'];
                        const count = res.data.data['comment_count'];
                        // 將li放進ul裡面
                        // console.log(time);
                        if (count < 6) {
                            notify(res.data.msg, 'success', false);
                            comment_list.insertAdjacentHTML("beforeend",
                                `<li class = "list-group-item d-flex pt-3 pb-4">
                                <img style="width: 55px;height: 55px;" src="https://fakeimg.pl/250x100/"
                                    class="rounded-circle">
                                <div class = "comment-body ms-4" >
                                    <h5>${user_name}<span class="fs-6 text-muted fw-normal ps-2">${time}</span></h5>
                                    ${comment}</div>
                            </li>`);

                            // 清空comment
                            content.value = "";

                            // 讓暫無留言不見
                            if (empty) {
                                empty.style.cssText = 'display:none;';
                            }

                            // 假如留言有is-invalid就remove掉
                            if (content.classList.contains('is-invalid')) {
                                content.classList.remove('is-invalid');
                            }
                        } else {
                            notify(res.data.msg, 'success', true);
                        }
                    } else {
                        alert(res.data.state)
                    }
                })
                .catch(error => {
                    // console.log(error.response.data.errors.content);
                    const errorMsg = error.response.data.errors.content;
                    content.classList.add('is-invalid');
                    // console.log(content.classList.contains('is-invalid'));
                    const invalidFeedback = document.
                    getElementById('invalid-feedback').innerHTML = errorMsg;
                    // console.log(content );
                });
        });
    }
</script>
@endsection
