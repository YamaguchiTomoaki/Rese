@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}" />
@endsection

@section('content')
<div class="review__content">
    <div class="review__ttl">
        <button type="button" class="back__btn" onClick="history.back()">＜</button>
        <h2 class="ttl__text">
            レビュー
        </h2>
    </div>
    <form class="review-form" action="/review/post" method="post">
        @csrf
        <div class="review-form__content">
            <div class="star__button">
                <input id="star5" type="radio" name="evaluation" value="5" {{old('star') == '5' ? 'checked' : ''}}>
                <label for="star5">★</label>
                <input id="star4" type="radio" name="evaluation" value="4" {{old('star') == '4' ? 'checked' : ''}}>
                <label for="star4">★</label>
                <input id="star3" type="radio" name="evaluation" value="3" {{old('star') == '3' ? 'checked' : ''}}>
                <label for="star3">★</label>
                <input id="star2" type="radio" name="evaluation" value="2" {{old('star') == '2' ? 'checked' : ''}}>
                <label for="star2">★</label>
                <input id="star1" type="radio" name="evaluation" value="1" {{old('star') == '1' ? 'checked' : ''}}>
                <label for="star1">★</label>
            </div>
            <div class="error-message__group">
                <p class="reservation-form__error-message">
                    @error('evaluation')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="comment__content">
                <textarea name="comment" placeholder="レビューコメントの記載をお願いします" rows="5">{{ old('comment') }}</textarea>
            </div>
            <div class="error-message__group">
                <p class="reservation-form__error-message">
                    @error('comment')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="review__button">
                <input type="hidden" name="shop_id" value="{{ $shop_id }}">
                <button type="submit">送信</button>
            </div>
        </div>
    </form>
</div>
@endsection