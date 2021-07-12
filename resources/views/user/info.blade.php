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
                @include('components.user_menu', ['nav' => 'info'])
            </div>
            <div class="col-md-9 border">
                <div class="py-3 border-bottom">修改個人信息</div>
                <div class="user-data py-4">
                    <div class="row">
                        <div class="col-md-5 mx-auto">
                            {{-- @include('components.error') --}}
                            @include('components.success')
                            @include('components.warning')
                            <form action="{{ route('user.info.update') }}" method="POST" novalidate>
                                @csrf
                                @method('PUT')
                                <label for="" class="form-label fw-bold">用戶名</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ auth()->user()->name }}" placeholder="請輸入用戶名">
                                {{-- <input type="text" name="name" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                value="{{ auth()->user()->name }}" placeholder="請輸入用戶名"> --}}
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="" class="form-label fw-bold mt-3">信箱</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ auth()->user()->email }}" placeholder="請輸入信箱">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
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
