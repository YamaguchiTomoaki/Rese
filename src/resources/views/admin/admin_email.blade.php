@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/admin_email.css') }}" />
@endsection

@section('content')
<form class="emai-form" action="/admin/email" method="post">
    @csrf
    <div class="email__content">
        <div class="email__back">
            <button type="button" class="back__btn" onClick="history.back()">＜</button>
        </div>
        <div class="email__subject">
            <input type="text" name="subject" placeholder="件名" value="{{ old('subject') }}">
        </div>
        <div class="error-message__group">
            <p class="email-form__error-message">
                @error('subject')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="email__maintext">
            <textarea name="maintext" placeholder="メール本文">{{ old('maintext') }}</textarea>
        </div>
        <div class="error-message__group">
            <p class="email-form__error-message">
                @error('maintext')
                {{ $message }}
                @enderror
            </p>
        </div>
    </div>
    <div class="email__button">
        <button type="submit" class="email__submit">送信</button>
    </div>
</form>
@endsection