@extends('layouts.app')

@section('title', '註冊')

@section('header')
    @include('layouts.header',
    ['img' => '/assets/img/about-bg.jpg',
    'heading' => 'Register',
    'subheading' => 'A Blog by Start Laravle & Bootstrap'])
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                @include('login.nav-top', ['nav' => 'register'])
                <form action="">
                    <label for="" class="form-label mt-3">帳號</label>
                    <input type="text" name="" class="form-control" placeholder="請輸入帳號">
                    <label for="" class="form-label mt-3">信箱</label>
                    <input type="email" name="email" class="form-control" placeholder="請輸入信箱">
                    <label for="" class="form-label mt-3">密碼</label>
                    <input type="password" name="password" class="form-control" placeholder="請輸入密碼">
                    <label for="" class="form-label mt-3">確認密碼</label>
                    <input type="password" name="" id="" class="form-control" placeholder="請確認密碼">
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary my-5 mx-auto">註冊</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
