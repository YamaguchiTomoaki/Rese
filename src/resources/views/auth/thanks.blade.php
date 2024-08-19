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
        <a class="thanks__link" href="/login">ログインする</a>
    </div>
</div>
@endsection