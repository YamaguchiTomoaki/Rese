@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reviewlist.css') }}" />
@endsection

@section('content')
<div class="reviewlist__content">
    <div class="shop__content">
        <div class="shop__ttl">
            <button type="button" class="back__btn" onClick="history.back()">＜</button>
            <h2 class="ttl__text">{{ $shopArray[0]['name'] }}</h2>
        </div>
        <div class="shop__image">
            <img src="{{ asset('storage/' . $shopArray[0]['image']) }}" alt="" />
        </div>
        <div class="shop__tag">
            <p class="shop__tag-area">#{{ $shopArray[0]['area']['area'] }}</p>
            <p class="shop__tag-genre">#{{ $shopArray[0]['genre']['genre'] }}</p>
        </div>
        <p class="shop__overview">{!! nl2br(e($shopArray[0]['overview'])) !!}</p>
    </div>
    <div class="review__content">
        @for ($id = 0;$id < $newreviewsCount;$id++)
            <div class="result__content">
            <div class="review__user">
                <p class="user__text">{{ $newreviews[$id]['user']['name'] }}</p>
            </div>
            <div class="review__image">
                <img class="image__image" src="{{ asset('storage/' . $newreviews[$id]['image']) }}" alt="">
            </div>
            <div class="star__button">
                <input id="star5" type="radio" name="{{ $id }}" value="5" {{$newreviews[$id]['evaluation'] == '5' ? 'checked' : ''}} disabled>
                <label for="star5">★</label>
                <input id="star4" type="radio" name="{{ $id }}" value="4" {{$newreviews[$id]['evaluation'] == '4' ? 'checked' : ''}} disabled>
                <label for="star4">★</label>
                <input id="star3" type="radio" name="{{ $id }}" value="3" {{$newreviews[$id]['evaluation'] == '3' ? 'checked' : ''}} disabled>
                <label for="star3">★</label>
                <input id="star2" type="radio" name="{{ $id }}" value="2" {{$newreviews[$id]['evaluation'] == '2' ? 'checked' : ''}} disabled>
                <label for="star2">★</label>
                <input id="star1" type="radio" name="{{ $id }}" value="1" {{$newreviews[$id]['evaluation'] == '1' ? 'checked' : ''}} disabled>
                <label for="star1">★</label>
            </div>
            <div class="comment__content">
                <p>{!! nl2br(e($newreviews[$id]['comment'])) !!}</p>
            </div>

    </div>
    @endfor
</div>
</div>
@endsection