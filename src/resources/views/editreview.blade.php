@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/editreview.css') }}" />
@endsection

@section('content')
<script src="{{ asset('/js/newreview.js') }}"></script>
<div class="editreview__content">
    <div class="shop__contet">
        <div class="shop__ttl">
            <p class="ttl__text">今回のご利用はいかがでしたか？</p>
        </div>
        <div class="card__wrap">
            <div class="card">
                <div class="card__img">
                    <img src="{{ asset('storage/' . $shopArray['image']) }}" alt="" />
                </div>
                <div class="card__content">
                    <div class="card__content-ttl">{{ $shopArray['name'] }}</div>
                    <div class="card__content-tag">
                        <p class="card__content-tag-area">#{{ $shopArray['area']['area'] }}</p>
                        <p class="card__content-tag-genre">#{{ $shopArray['genre']['genre'] }}</p>
                    </div>
                    <div class="card__content-btn">
                        <a href="/detail/{{ $shopArray['id'] }}" class="card__content-btn-detail">詳しく見る</a>
                        @if ($shopArray['favorite'] == 1)
                        <form class="favorite-form" action="/remove" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <input type="hidden" name="shop_id" value="{{ $shopArray['id'] }}">
                            <button class="card__content-btn-favorite--off" type="submit">❤</button>
                        </form>
                        @else
                        <form class="favorite-form" action="/favorite" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <input type="hidden" name="shop_id" value="{{ $shopArray['id'] }}">
                            <button class="card__content-btn-favorite--on" type="submit">❤</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="review__content">
        <form class="editreview-form" action="/newreview/edit" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="shop_id" value="{{ $shopArray['id'] }}">
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <input type="hidden" name="newreview_id" value="{{ $newreview[0]['id'] }}">
            <div class="evaluation__ttl">
                <p class="evaluation__ttl--text">体験を評価してください</p>
            </div>
            <div class="star__button">
                <input id="star5" type="radio" name="evaluation" value="5" {{old('star',$newreview[0]['evaluation']) == '5' ? 'checked' : ''}}>
                <label for="star5">★</label>
                <input id="star4" type="radio" name="evaluation" value="4" {{old('star',$newreview[0]['evaluation']) == '4' ? 'checked' : ''}}>
                <label for="star4">★</label>
                <input id="star3" type="radio" name="evaluation" value="3" {{old('star',$newreview[0]['evaluation']) == '3' ? 'checked' : ''}}>
                <label for="star3">★</label>
                <input id="star2" type="radio" name="evaluation" value="2" {{old('star',$newreview[0]['evaluation']) == '2' ? 'checked' : ''}}>
                <label for="star2">★</label>
                <input id="star1" type="radio" name="evaluation" value="1" {{old('star',$newreview[0]['evaluation']) == '1' ? 'checked' : ''}}>
                <label for="star1">★</label>
            </div>
            <div class="error-message__group">
                <p class="editreview-form__error-message">
                    @error('evaluation')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="comment__ttl">
                <p class="comment__ttl--text">口コミを投稿</p>
            </div>
            <div class="comment__text">
                <textarea class="comment" name="comment" placeholder="カジュアルな夜のお出かけにおすすめのスポット">{{ old('comment',$newreview[0]['comment']) }}</textarea>
                <div class="count__content">
                    <p class="comment__count">0</p>
                    <p>/400</p>
                </div>
            </div>
            <div class="error-message__group">
                <p class="editreview-form__error-message">
                    @error('comment')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="image__ttl">
                <p class="image__ttl--text">画像の追加</p>
            </div>
            <div class="image__image">
                <input type="file" name="image" id="image" accept=".jpg,.png" hidden>
                <span id="span" class="first__line">クリックして写真を追加</span>
                <span id="span" class="second__line">またはドラッグアンドドロップ</span>
                <img class="preview__image" src="" alt="" hidden>
            </div>
            <div class="error-message__group">
                <p class="editreview-form__error-message">
                    @error('image')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="review__button">
                <button type="submit">口コミを投稿</button>
            </div>
        </form>
    </div>
    @endsection