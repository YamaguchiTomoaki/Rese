@extends('layouts.representative')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative/representative_csv.css') }}" />
@endsection

@section('content')
<script src="{{ asset('/js/csv.js') }}"></script>
<form class="csv-form" action="/representative/csv" method="post" enctype="multipart/form-data">
    @csrf
    <div class="csv-form__back">
        <button type="button" class="back__btn" onClick="history.back()">＜</button>
    </div>
    <div class="csv__ttl">
        <p class="csv__ttl--text">csvファイルの添付</p>
    </div>
    <div class="csv__input">
        <input type="file" name="csvFile" id="csvFile" accept=".csv" hidden>
        <span id="span" class="first__line">クリックしてcsvファイルを追加</span>
        <span id="span" class="second__line">またはドラッグアンドドロップ</span>
        <span id="csv__name" class="csv__name" hidden></span>
    </div>
    <div class="error-message__group">
        <p class="csv-form__error-message">
            @error('csvFile')
            {{ $message }}
            @enderror
        </p>
        <p class="csv-form__error-message">
            @error('csv_array.*.name')
            {{ $message }}
            @enderror
        </p>
        <p class="csv-form__error-message">
            @error('csv_array.*.areas')
            {{ $message }}
            @enderror
        </p>
        <p class="csv-form__error-message">
            @error('csv_array.*.genres')
            {{ $message }}
            @enderror
        </p>
        <p class="csv-form__error-message">
            @error('csv_array.*.overview')
            {{ $message }}
            @enderror
        </p>
        <p class="csv-form__error-message">
            @error('csv_array.*.image')
            {{ $message }}
            @enderror
        </p>
    </div>
    @if (session('flash_message'))
    <div class="flash_message">
        {{ session('flash_message') }}
    </div>
    @endif
    <div class="csv__button">
        <input type="hidden" name="representative_id" value="{{ $representative_id }}">
        <button type="submit">作成</button>
    </div>
</form>
@endsection