@extends('layouts.app')

@section('title', '登入')

@section('header')
    @include('layouts.header',
    ['img' => '/assets/img/about-bg.jpg',
    'heading' => 'Login',
    'subheading' => 'A Blog by Start Laravle & Bootstrap'])
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                @include('login.nav-top', ['nav' => 'login'])
                <form action="">
                    <label for="" class="form-label mt-3">帳號</label>
                    <input type="email" name="" class="form-control" placeholder="請輸入帳號/信箱">
                    <label for="" class="form-label mt-4">密碼</label>
                    <input type="password" name="password" class="form-control" placeholder="請輸入密碼">
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary my-5 mx-auto">登入</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
