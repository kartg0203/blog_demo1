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
                @include('auth.nav-top', ['nav' => 'login'])
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <label for="" class="form-label mt-3">信箱</label>
                    <input type="email" name="email" class="form-control" placeholder="請輸入信箱" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger pt-1">{{ $message }}</div>
                    @enderror
                    <label for="" class="form-label mt-4">密碼</label>
                    <input type="password" name="password" class="form-control" placeholder="請輸入密碼">
                    @error('password')
                        <div class="text-danger pt-1">{{ $message }}</div>
                    @enderror
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary my-5 mx-auto">登入</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
