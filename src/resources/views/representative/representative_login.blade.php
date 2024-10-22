@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/admin_login.css') }}" />
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__ttl">Login</div>
    <div class="login-form__inner">
        <form method="post" action="{{ route('representative.login.store') }}">
            @csrf
            <div class="login-form__group">
                <div class="mail-solid icon"></div>
                <input class="login-form__input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="error-message__group">
                <p class="login-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="login-form__group">
                <div class="lock-solid icon"></div>
                <input class="login-form__input" type="password" name="password" placeholder="Password">
            </div>
            <div class="error-message__group">
                <p class="login-form__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="error-message__group">
                <p class="login-form__error-message">
                    @error('failed')
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