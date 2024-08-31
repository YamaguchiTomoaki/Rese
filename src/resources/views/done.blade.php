@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}" />
@endsection

@section('content')
<div class="done__content">
    <div class="done__ttl">
        <h2 class="ttl__text">
            ご予約ありがとうございます
        </h2>
    </div>
    <div class="done__button">
        <button type="button" class="back__btn" onClick="history.back()">戻る</button>
    </div>
</div>
@endsection