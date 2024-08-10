@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}" />
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__ttl">Login</div>
    <div class="login-form__inner">
        <form class="login-form" action="/login" method="post">
            @csrf
            <div class="login-form__group">
                <input class="login-form__input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <p class="login-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="login-form__group">
                <input class="login-form__input" type="password" name="password" placeholder="Password">
                <p class="login-form__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="login-form__group--button">
                <button class="login-form__button" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection