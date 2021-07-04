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
                @include('components.user_menu', ['nav' => 'avatar'])
            </div>
            <div class="col-md-9 border">
                <div class="py-3 border-bottom">修改頭像</div>
                <div class="user-data py-4">
                    <div class="row">
                        <div class="col-md-5 offset-3">
                            <form action="">
                                <label for="formFile" class="form-label">請選擇圖片</label>
                                <input class="form-control" type="file" id="formFile">
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn  btn-primary btn-sm">修改</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
