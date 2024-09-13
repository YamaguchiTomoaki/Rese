@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/change.css') }}" />
@endsection

@section('content')
<form class="change-form" action="/change/reservation" method="post">
    @csrf
    <div class="change__content">
        <div class="change__ttl">
            <button type="button" class="back__btn" onClick="history.back()">＜</button>
            <h2 class="ttl__text">予約変更</h2>
            <p class="shop__name">店名：{{ $reservationArray[0]['shop']['name'] }}</p>
            <a href="/detail/{{ $reservationArray[0]['shop_id'] }}" class="shop__detail">詳しく見る</a>
        </div>
        <div class="change__date">
            <input type="date" name="date" id="date" min="" value="{{ old("date", $reservationArray[0]['date'] ) }}">
        </div>
        <div class="error-message__group">
            <p class="reservation-form__error-message">
                @error('date')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="change__time">
            <div class="select__pointer">
                <select name="time" id="time">
                    @if ($headstr != "0")
                    <option value="{{ substr($reservationArray[0]['time'], 0, 5) }}" selected hidden>{{ substr($reservationArray[0]['time'], 0, 5) }}</option>
                    @else
                    <option value="{{ substr($reservationArray[0]['time'], 0, 5) }}" selected hidden>{{ substr($reservationArray[0]['time'], 1, 4) }}</option>
                    @endif
                    @for ($hour = 0; $hour < 24; $hour++)
                        @for ($minutes=0; $minutes < 60; $minutes +=30)
                        @if ($hour < 10 && $minutes==0)
                        <option value="0{{ $hour }}:0{{ $minutes }}" @if(old('time')=='0' . $hour . ':0' . $minutes) selected @endif>{{ $hour }}:0{{ $minutes }}</option>
                        @elseif($minutes == 0)
                        <option value="{{ $hour }}:0{{ $minutes }}" @if(old('time')==$hour . ':0' . $minutes) selected @endif>{{ $hour }}:0{{ $minutes }}</option>
                        @elseif($hour < 10)
                            <option value=" 0{{ $hour }}:{{ $minutes }}" @if(old('time')=='0' . $hour . ':' . $minutes) selected @endif>{{ $hour }}:{{ $minutes }}</option>
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
        <div class="change__number">
            <div class="select__pointer">
                <select name="number" id="number">
                    <option value="{{ $reservationArray[0]['number'] }}" selected hidden>{{ $reservationArray[0]['number'] }}人</option>
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
        </script>
    </div>
    <div class="change__btn">
        <input type="hidden" name="id" value="{{ $reservationArray[0]['id'] }}">
        <button class="change__button" type="submit">予約変更</button>
    </div>
</form>

@endsection