@extends('layouts.app')

@section('title', '個人中心')
@section('header')
    @include('layouts.header',
    ['img' => '/assets/img/contact-bg.jpg',
    'heading' => '個人中心',
    'subheading' => 'A Blog by Start Laravle & Bootstrap'])
@endsection

@section('content')
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-3">
                @include('components.user_menu', ['nav' => 'blog'])
            </div>
            <div class="col-md-9">
                <div class="content border px-3">
                    <div class="p-3 border-bottom">所有文章</div>
                    <div class="user-data">
                        <ul class="list-group list-group-flush">
                            @foreach ($blogs as $blog)
                                <li class="list-group-item py-4">
                                    <h5><a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a></h5>
                                    <div class="d-flex">
                                        <span class="fs-6 me-2"><i
                                                class="far fa-clock me-1 text-secondary"></i>{{ $blog->created_at->diffForHumans() }}</span>
                                        <span class="fs-6 me-2"><i
                                                class="far fa-eye me-1 text-secondary"></i>{{ $blog->view }}</span>
                                        <span class="fs-6 me-2"><i
                                                class="far fa-comment-dots me-1 text-secondary"></i>{{ $blog->comments_count }}</span>
                                        <span class=" ms-auto">
                                            <div class="form-check form-switch d-inline-block pe-4">
                                                <input class="status-blog form-check-input" type="checkbox"
                                                    id="status-{{ $blog->id }}"
                                                    data-url="{{ route('blogs.status', $blog) }}" @if ($blog->status == 1) checked @endif>
                                                <label class="form-check-label" for="status-{{ $blog->id }}">發布</label>
                                            </div>
                                            <button class="edit-blog btn btn-sm btn-primary px-3 rounded"
                                                data-url="{{ route('blogs.edit', $blog) }}">編輯</button>
                                            {{-- 這裡使用類是因為假如使用id，目前是循環狀態，會有很多id，這是不行的 --}}
                                            <button class="del-blog btn btn-sm btn-danger px-3 rounded"
                                                data-url="{{ route('blogs.destroy', $blog) }}">刪除</button>
                                        </span>
                                    </div>
                                    </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="page mt-4 d-flex justify-content-center">{{ $blogs->links() }}</div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let url;
        /**
         *改變發布狀態
         */
        const statusBlog = document.querySelectorAll('.list-group .status-blog');
        // console.log(statusBlog);
        statusBlog.forEach(item => {
            item.addEventListener('change', () => {
                // console.log(item.value);
                url = item.getAttribute('data-url');
                axios.patch(url, {})
                    .then(res => {
                        if (res.data.state) {
                            notify(res.data.msg, 'success');
                        } else {
                            notify(res.data.msg, 'error');
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            });
        });
        /**
         *跳轉編輯
         */
        const editBlog = document.querySelectorAll('.list-group .edit-blog');
        editBlog.forEach((item, index) => {
            item.addEventListener('click', () => {
                url = item.getAttribute('data-url');
                // console.log(url);
                location.href = url;
            });
        })
        /**
         *刪除blog
         */
        const delBlogs = document.querySelectorAll('.list-group .del-blog');
        // const listGroup = document.querySelectorAll('.list-group .list-group-item');
        delBlogs.forEach((item, index) => {
            item.addEventListener('click', () => {
                // console.log(item.getAttribute('data-url'));
                if (window.confirm('確定要刪除嗎?')) {
                    url = item.getAttribute('data-url');
                    axios.delete(url)
                        .then(res => {
                            // console.log(res.data);
                            if (res.data.state) {
                                notify(res.data.msg, 'success');
                                const list = item.parentElement.parentElement.parentElement;
                                list.remove();
                            } else {
                                notify(res.data.msg, 'error');
                            }

                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
            });
        })
    </script>
@endsection
