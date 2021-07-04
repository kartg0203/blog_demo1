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
                @for ($i = 0; $i < 6; $i++)
                    <div class="post-preview">
                        <a href="{{ route('blogs.show', ['blog' => 1]) }}">
                            <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                            <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 24, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                @endfor
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
                        →</a></div>
            </div>
        </div>
    </div>
@endsection
