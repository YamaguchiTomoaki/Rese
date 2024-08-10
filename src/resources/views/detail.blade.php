@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('header')
@endsection

@section('content')
<div class="detail__content">
    <div class="detail__ttl">
        <button type="button" class="back__btn" onClick="history.back()">＜</button>
        <h2 class="ttl__text">{{ $shopArray['name'] }}</h2>
    </div>
    <div class="detail__image">
        <img src="{{ $shopArray['image_id'] }}" alt="" />
    </div>
    <div class="detail__tag">
        <p class="detail__tag-area">#{{ $shopArray['area'] }}</p>
        <p class="detail__tag-genre">#{{ $shopArray['genre'] }}</p>
    </div>
    <p class="detail__overview">{{ $shopArray['overview'] }}</p>
</div>
@endsection