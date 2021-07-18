@extends('layouts.app')

@section('title', '首頁')

@section('header')
    @include('layouts.header',
    ['img' => '/assets/img/home-bg.jpg',
    'heading' => 'Laravel Blog',
    'subheading' => 'A Blog by Start Laravle & Bootstrap'])
@endsection

@section('content')
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach ($blogs as $blog)
                    <div class="post-preview">
                        <a href="{{ route('blogs.show', $blog) }}">
                            <h2 class="">{{ $blog->title }}</h2>
                            <div class="post-subtitle">{{ mb_substr($blog->content, 0, 30, 'utf-8') }}...</div>
                        </a>
                        <p class="post-meta d-flex justify-content-between">
                            <span class="badge bg-primary">{{ $blog->category->name }}</span>
                            <span>
                                作者：<span class="font-weight-bold">{{ $blog->user->name }}</span>
                                最新回復：{{ $blog->updated_at->diffForHumans() }}
                            </span>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                @endforeach
                <div class="d-flex justify-content-between mb-4">
                    <span>文章總數：{{ $blogs->total() }}</span>
                    <span>
                        {{-- {{ $blogs->appends(['keyword' => request()->query('keyword')])->links() }} --}}
                        {{ $blogs->withQueryString()->links() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
