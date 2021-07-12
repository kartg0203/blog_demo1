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
                            @include('components.warning')
                            @include('components.success')
                            <form action="{{ route('user.avatar.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <label for="formFile" class="form-label">請選擇圖片</label>
                                <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="formFile"
                                    name="avatar">
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
