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
            <div class="col-md-9 border">
                <div class="py-3 border-bottom">所有文章</div>
                <div class="user-data">
                    <ul class="list-group list-group-flush">
                        @for ($i = 0; $i < 6; $i++)
                            <li class="list-group-item py-4">
                                <h5>博客標題博客標題博客標題</h5>
                                <div class="d-flex">
                                    <span class="fs-6 me-2"><i class="far fa-clock me-1 text-secondary"></i>5個月</span>
                                    <span class="fs-6 me-2"><i class="far fa-eye me-1 text-secondary"></i>422</span>
                                    <span class="fs-6 me-2"><i class="far fa-comment-dots me-1 text-secondary"></i>3</span>
                                    <span class="ms-auto">
                                        <button class="btn btn-sm btn-primary px-3 rounded">編輯</button>
                                        <button class="btn btn-sm btn-danger px-3 rounded">刪除</button>
                                    </span>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
