@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative/representative_index.css') }}" />
@endsection

@section('content')
<div class="representative__content">
    <div class="shop__create">
        <form class="create-form" action="/representative/create" method="get">
            <input type="hidden" name="representative_id" value="{{ $representative['id'] }}">
            <button class="create__button" type="submit">店舗情報の作成</button>
        </form>
    </div>
    <div class="shop__edit">
        <form class="edit-form" action="/representative/edit" method="get">
            <input type="hidden" name="representative_id" value="{{ $representative['id'] }}">
            <button class="edit__button" type="submit">店舗情報の編集</button>
        </form>
    </div>
    <div class="shop__reservation">
        <form class="reservation-form" action="/representative/reservation" method="get">
            <input type="hidden" name="representative_id" value="{{ $representative['id'] }}">
            <button class="reservation__button" type="submit">予約一覧</button>
        </form>
    </div>
</div>
<div class="representative__logout">
    <form method="post" action="{{ route('representative.login.destroy') }}">
        @method('DELETE')
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</div>
@endsection