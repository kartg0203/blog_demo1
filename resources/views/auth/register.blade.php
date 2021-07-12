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
                @include('auth.nav-top', ['nav' => 'register'])
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <label for="" class="form-label mt-3">帳號</label>
                    <input type="text" name="name" class="form-control" placeholder="請輸入帳號" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="" class="form-label mt-3">信箱</label>
                    <input type="email" name="email" class="form-control" placeholder="請輸入信箱" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="" class="form-label mt-3">密碼</label>
                    <input type="password" name="password" class="form-control" placeholder="請輸入密碼">
                    @error('password')
                        <div class="text-danger pt-1">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="" class="form-label mt-3">確認密碼</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="請確認密碼">

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary my-5 mx-auto">註冊</button>
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
