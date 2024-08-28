@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('header')
@endsection

@section('content')
<div class="detail__content">
    <div class="shop__content">
        <div class="shop__ttl">
            <button type="button" class="back__btn" onClick="history.back()">＜</button>
            <h2 class="ttl__text">{{ $shopArray['name'] }}</h2>
        </div>
        <div class="shop__image">
            <img src="{{ $shopArray['image_id'] }}" alt="" />
        </div>
        <div class="shop__tag">
            <p class="shop__tag-area">#{{ $shopArray['area'] }}</p>
            <p class="shop__tag-genre">#{{ $shopArray['genre'] }}</p>
        </div>
        <p class="shop__overview">{{ $shopArray['overview'] }}</p>
    </div>
    <div class="reservation__content">
        <form class="reservation-form" action="/reservation" method="post">
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
                    <select name="time" id="time">
                        @for ($hour = 0; $hour < 24; $hour++)
                            @for ($minutes=0; $minutes < 60; $minutes +=30)
                            @if ($minutes==0)
                            <option value="{{ $hour }}:0{{ $minutes }}">{{ $hour }}:0{{ $minutes }}</option>
                            @else
                            <option value="{{ $hour }}:{{ $minutes }}">{{ $hour }}:{{ $minutes }}</option>
                            @endif
                            @endfor
                            @endfor
                    </select>
                </div>
                <div class="error-message__group">
                    <p class="reservation-form__error-message">
                        @error('time')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="reservation__number">
                    <select name="number" id="number">
                        @for ($count = 1; $count < 11; $count++)
                            <option value="{{ $count }}">{{ $count }}人</option>
                            @endfor
                    </select>
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
                            /*初期値設定があるとバリデーションエラー時のoldメソッドが効かなくなる為、なくてもいいかも */
                            //field.value = data;
                            field.setAttribute("min", data);

                            window.onload = function() {
                                output__date.innerText = date.value;
                                output__time.innerText = time.value;
                                output__number.innerText = number.value + "人";
                            }

                            function inputChange(event) {
                                output__date.innerText = date.value;
                                output__time.innerText = time.value;
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