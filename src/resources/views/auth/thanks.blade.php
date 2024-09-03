@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/thanks.css') }}" />
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__ttl">
        <h2 class="ttl__text">
            会員登録ありがとうございます
        </h2>
    </div>
    <div class="thanks__button">
        <form class="d-inline" method="POST" action="/email/verification-notification">
            @csrf
            <p>メールが届いていない場合は下記のボタンをクリックしてください<br />再度認証メールを送信します</p>
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('再送する') }}</button>
    </div>
</div>
@endsection