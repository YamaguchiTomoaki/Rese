@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection

@section('content')
<div class="mypage__header">
    <h2 class="user_name">{{ $user_name }}さん</h2>
</div>
<div class="mypage__content">
    <div class="reservation__content">
        <div class="reservation__ttl">
            <h3 class="ttl__text">予約状況</h3>
        </div>
        @for ($id = 0;$id < $reservationCount;$id++)
            <div class="reservation__card">
            <div class="card__header--reservation">
                <div class="card__header--icon">
                    <div class="clock-h9m0-solid icon"></div>
                    <div class="card__ttl--reservation">
                        予約{{ $id+1 }}
                    </div>
                </div>
                <form class="reservation-form__change" action="/change" method="get">
                    <div class="reservation-form__btn">
                        <input type="hidden" name="reservation_id" value="{{ $reservationArray[$id]['id'] }}">
                        <button class="change__button">予約変更</button>
                    </div>
                </form>
                <form class="reservation-form" action="/cancel" method="post">
                    @csrf
                    <div class="reservation-form__btn">
                        <input type="hidden" name="reservation_id" value="{{ $reservationArray[$id]['id'] }}">
                        <button class="cancel__button">×</button>
                    </div>
                </form>
            </div>
            <table class="reservation-table">
                <tr class="table__row">
                    <th class="table__ttl">Shop</th>
                    <td class="table__item">
                        {{ $reservationArray[$id]['shop']['name'] }}
                    </td>
                </tr>
                <tr class=" table__row">
                    <th class="table__ttl">Date</th>
                    <td class="table__item">
                        {{ $reservationArray[$id]['date']}}
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__ttl">Time</th>
                    <td class="table__item">
                        {{ substr($reservationArray[$id]['time'], 0, 5) }}
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__ttl">Number</th>
                    <td class="table__item">
                        {{ $reservationArray[$id]['number'] }}人
                    </td>
                </tr>
            </table>
    </div>
    @endfor
</div>

<div class="favorite__content">
    <div class="favorite__ttl">
        <h3 class="ttl__text">お気に入り店舗</h3>
    </div>
    <div class="card__wrap">
        @for ($id = 0; $id < $favoriteCount; $id++) <div class="card">
            <div class="card__img">
                <img src="{{ $favoriteArray[$id]['shop']['image_id'] }}" alt="" />
            </div>
            <div class="card__content">
                <div class="card__content-ttl">{{ $favoriteArray[$id]['shop']['name'] }}</div>
                <div class="card__content-tag">
                    <p class="card__content-tag-area">#{{ $favoriteArray[$id]['shop']['area'] }}</p>
                    <p class="card__content-tag-genre">#{{ $favoriteArray[$id]['shop']['genre'] }}</p>
                </div>
                <div class="card__content-btn">
                    <a href="/detail/{{ $favoriteArray[$id]['shop_id'] }}" class="card__content-btn-detail">詳しく見る</a>
                    <form class="favorite-form" action="/mypage/remove" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="shop_id" value="{{ $favoriteArray[$id]['shop']['id'] }}">
                        <button class="card__content-btn-favorite--off" type="submit">❤</button>
                    </form>
                </div>
            </div>
    </div>
    @endfor
</div>
</div>
</div>
@endsection