@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
<div class="detail__content">
    <div class="shop__content">
        <div class="shop__ttl">
            <button type="button" class="back__btn" onClick="history.back()">＜</button>
            <h2 class="ttl__text">{{ $shopArray['name'] }}</h2>
            <form class="review-form" action="/review" method="get">
                <input type="hidden" name="shop_id" value="{{ $shopArray['id'] }}">
                <button class="review__btn">レビュー</button>
            </form>
        </div>
        <div class="shop__image">
            <img src="{{ asset('storage/' . $shopArray['image']) }}" alt="" />
        </div>
        <div class="shop__tag">
            <p class="shop__tag-area">#{{ $shopArray['area'] }}</p>
            <p class="shop__tag-genre">#{{ $shopArray['genre'] }}</p>
        </div>
        <p class="shop__overview">{!! nl2br(e($shopArray['overview'])) !!}</p>
        <div class="reviewlist__content">
            <form class="list-form" action="/newreview/list">
                <button type="submit">全ての口コミ情報</button>
            </form>
        </div>
        @if($newreview_status != 1)
        <div class="newreview__content">
            <form class="newreview-form" action="/newreview" method="get">
                <input type="hidden" name="shop_id" value="{{ $shopArray['id'] }}">
                <button class="newreview__btn" type="submit">口コミを投稿する</button>
            </form>
        </div>
        @else
        <div class="result__content">
            <div class="result__head">
                <form class="edit-form" action="/newreview/edit" method="get">
                    <input type="hidden" name="newreview_id" value="{{ $newreview[0]['id'] }}">
                    <button type="submit" class="edit__button">口コミを編集</button>
                </form>
                <form class="delete-form" action="/newreview/delete" method="post">
                    <input type="hidden" name="newreview_id" value="{{ $newreview[0]['id'] }}">
                    <button type="submit" class="edit__button">口コミを削除</button>
                </form>
            </div>
            <div class="star__button">
                <input id="star5" type="radio" name="evaluation" value="5" {{$newreview[0]['evaluation'] == '5' ? 'checked' : ''}} disabled>
                <label for="star5">★</label>
                <input id="star4" type="radio" name="evaluation" value="4" {{$newreview[0]['evaluation'] == '4' ? 'checked' : ''}} disabled>
                <label for="star4">★</label>
                <input id="star3" type="radio" name="evaluation" value="3" {{$newreview[0]['evaluation'] == '3' ? 'checked' : ''}} disabled>
                <label for="star3">★</label>
                <input id="star2" type="radio" name="evaluation" value="2" {{$newreview[0]['evaluation'] == '2' ? 'checked' : ''}} disabled>
                <label for="star2">★</label>
                <input id="star1" type="radio" name="evaluation" value="1" {{$newreview[0]['evaluation'] == '1' ? 'checked' : ''}} disabled>
                <label for="star1">★</label>
            </div>
            <div class="comment__content">
                <p>{!! nl2br(e($newreview[0]['comment'])) !!}</p>
            </div>
        </div>
        @endif
    </div>
    <div class="reservation__content">
        <form class="reservation-form" action="/done" method="post">
            @csrf
            <input type="hidden" name="shop_id" value="{{ $shopArray['id'] }}">
            <div class="reservation-form__content">
                <div class="reservation__ttl">
                    <h2 class="ttl__text-reservation">予約</h2>
                </div>
                <div class="reservation__date">
                    <input type="date" name="date" id="date" min="" value="{{ old('date') }}">
                </div>
                <div class="error-message__group">
                    <p class="reservation-form__error-message">
                        @error('date')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="reservation__time">
                    <div class="select__pointer">
                        <select name="time" id="time">
                            @for ($hour = 0; $hour < 24; $hour++)
                                @for ($minutes=0; $minutes < 60; $minutes +=30)
                                @if ($hour < 10 && $minutes==0)
                                <option value="0{{ $hour }}:0{{ $minutes }}" @if(old('time')=='0' . $hour . ':0' . $minutes) selected @endif>{{ $hour }}:0{{ $minutes }}</option>
                                @elseif($minutes == 0)
                                <option value="{{ $hour }}:0{{ $minutes }}" @if(old('time')==$hour . ':0' . $minutes) selected @endif>{{ $hour }}:0{{ $minutes }}</option>
                                @elseif($hour < 10)
                                    <option value="0{{ $hour }}:{{ $minutes }}" @if(old('time')=='0' . $hour . ':' . $minutes) selected @endif>{{ $hour }}:{{ $minutes }}</option>
                                    @else
                                    <option value=" {{ $hour }}:{{ $minutes }}" @if(old('time')==$hour . ':' . $minutes) selected @endif>{{ $hour }}:{{ $minutes }}</option>
                                    @endif
                                    @endfor
                                    @endfor
                        </select>
                    </div>
                </div>
                <div class=" error-message__group">
                    <p class="reservation-form__error-message">
                        @error('time')
                        {{ $message }}
                        @enderror
                        @error('date_time')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="reservation__number">
                    <div class="select__pointer">
                        <select name="number" id="number">
                            @for ($count = 1; $count < 11; $count++)
                                <option value="{{ $count }}" @if(old('number')==$count) selected @endif>{{ $count }}人</option>
                                @endfor
                        </select>
                    </div>
                </div>
                <div class="error-message__group">
                    <p class="reservation-form__error-message">
                        @error('number')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="shop__confirm">
                    <table class="confirm-table">
                        <tr class="table__row">
                            <th class="table__ttl">Shop</th>
                            <td class="table__item">
                                <p>{{ $shopArray['name'] }}</p>
                            </td>
                        </tr>
                        <tr class="table__row">
                            <th class="table__ttl">Date</th>
                            <td class="table__item">
                                <p id="output__date"></p>
                            </td>
                        </tr>
                        <tr class="table__row">
                            <th class="table__ttl">Time</th>
                            <td class="table__item">
                                <p id="output__time"></p>
                            </td>
                        </tr>
                        <tr class="table__row">
                            <th class="table__ttl">Number</th>
                            <td class="table__item">
                                <p id="output__number"></p>
                            </td>
                        </tr>
                        <script lang="javascript" type="text/javascript">
                            const today = new Date();

                            function dateFormat(today, format) {
                                format = format.replace("YYYY", today.getFullYear());
                                format = format.replace("MM", ("0" + (today.getMonth() + 1)).slice(-2));
                                format = format.replace("DD", ("0" + today.getDate()).slice(-2));
                                return format;
                            }
                            const data = dateFormat(today, 'YYYY-MM-DD');
                            const field = document.getElementById('date');
                            field.setAttribute("min", data);

                            window.onload = function() {
                                output__date.innerText = date.value;
                                if (time.value.slice(0, 1) == '0') {
                                    output__time.innerText = time.value.slice(1);
                                } else {
                                    output__time.innerText = time.value;
                                }
                                output__number.innerText = number.value + "人";
                            }

                            function inputChange(event) {
                                output__date.innerText = date.value;
                                if (time.value.slice(0, 1) == '0') {
                                    output__time.innerText = time.value.slice(1);
                                } else {
                                    output__time.innerText = time.value;
                                }
                                output__number.innerText = number.value + "人";

                            }

                            let date = document.getElementById('date');
                            date.addEventListener('change', inputChange);
                            let output__date = document.getElementById('output__date');
                            let time = document.getElementById('time');
                            time.addEventListener('change', inputChange);
                            let output__time = document.getElementById('output__time');
                            let number = document.getElementById('number');
                            number.addEventListener('change', inputChange);
                            let output__number = document.getElementById('output__number');
                        </script>
                    </table>
                </div>
            </div>
            <div class="reservation__button">
                <button type="submit">予約する</button>
            </div>
        </form>

    </div>
</div>
@endsection