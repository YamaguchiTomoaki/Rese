@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/admin_create.css') }}" />
@endsection

@section('content')
<div class="create__content">
    <div class="admin-form__ttl">
        <button type="button" class="back__btn" onClick="history.back()">＜</button>
        <p class="ttl__text">店舗責任者</p>
    </div>
    <div class="admin-form__inner">
        <form class="admin-form" action="/admin/representative" method="post">
            @csrf
            <div class="admin-form__group">
                <div class="profile-solid icon"></div>
                <input type="text" class="admin-form__input" name="name" placeholder="Username" value="{{ old('name') }}">
            </div>
            <div class="error-message__group">
                <p class="admin-form__error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="admin-form__group">
                <div class="mail-solid icon"></div>
                <input type="text" class="admin-form__input" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="error-message__group">
                <p class="admin-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="admin-form__group">
                <div class="lock-solid icon"></div>
                <input type="password" class="admin-form__input" name="password" placeholder="Password">

            </div>
            <div class="error-message__group">
                <p class="admin-form__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="admin-form__group--button">
                <button class="admin-form__button" type="submit">
                    作成
                </button>
            </div>
        </form>
    </div>

</div>
@endsection