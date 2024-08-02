@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="index__content">
    <div class="card">
        <div class="card__img">
            <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="" />
        </div>
        <div class="card__content">
            <div class="card__content-ttl">仙人</div>
            <div class="card__content-tag">
                <p class="card__content-tag-area">#東京都</p>
                <p class="card__content-tag-genre">#寿司</p>
            </div>
            <div class="card__content-btn">
                <button class="card__content-btn-detail">詳しく見る</button>
                <button class="card__content-btn-favorite">❤</button>
            </div>
        </div>
    </div>
</div>
@endsection