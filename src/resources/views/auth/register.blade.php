@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}" />
@endsection

@section('content')
<div class="register-form__content">
    <div class="register-form__ttl">Registration</div>
    <div class="register-form__inner">
        <form class="register-form" action="/register" method="post">
            @csrf
            <div class="register-form__group">
                <div class="profile-solid icon"></div>
                <input class="register-form__input" type="text" name="name" placeholder="Username" value="{{ old('name') }}">
                <p class="register-form__error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <div class="mail-solid icon"></div>
                <input class="register-form__input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <p class="register-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <div class="lock-solid icon"></div>
                <input class="register-form__input" type="password" name="password" placeholder="Password">
                <p class="register-form__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__group--button">
                <button class="register-form__button" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection