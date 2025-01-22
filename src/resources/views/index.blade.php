@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('header')
<form class="search-form" action="/search" method="get">
    <div class="search-form__item">
        <div class="search-form__item-sort">
            <div class="select__pointer">
                <select name="sort" onchange="submit(this.form)">
                    <option value="null">並び替え：評価高/低</option>
                    <option value="1" @if( request('sort')==1 ) selected @endif>ランダム</option>
                    <option value="2" @if( request('sort')==2 ) selected @endif>評価が高い順</option>
                    <option value="3" @if( request('sort')==3 ) selected @endif>評価が低い順</option>
                </select>
            </div>
        </div>
        <div class="search-form__item-area">
            <div class="select__pointer">
                <select name="area" onchange="submit(this.form)">
                    <option value="null">All area</option>
                    @foreach ($areas as $area)
                    <option value="{{ $area['id'] }}" @if( request('area')==$area['id'] ) selected @endif>{{ $area['area'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="search-form__item-genre">
            <div class="select__pointer">
                <select name="genre" onchange="submit(this.form)">
                    <option value="null">All genre</option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre['id'] }}" @if( request('genre')==$genre['id'] ) selected @endif>{{ $genre['genre'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="search-form__item-name">
            <span></span>
            <input type="text" name="name" placeholder="Search..." value="{{ request('name') }}">
        </div>
    </div>
</form>

@endsection

@section('content')
<div class="index__content">
    <div class="card__wrap">
        @for ($id = 0; $id < $shopCount; $id++) <div class="card">
            <div class="card__img">
                <img src="{{ asset('storage/' . $shopArray[$id]['image']) }}" alt="" />
            </div>
            <div class="card__content">
                <div class="card__content-ttl">{{ $shopArray[$id]['name'] }}</div>
                <div class="card__content-tag">
                    <p class="card__content-tag-area">#{{ $shopArray[$id]['area'] }}</p>
                    <p class="card__content-tag-genre">#{{ $shopArray[$id]['genre'] }}</p>
                </div>
                <div class="card__content-btn">
                    <a href="/detail/{{ $shopArray[$id]['id'] }}" class="card__content-btn-detail">詳しく見る</a>
                    @if ($shopArray[$id]['favorite'] == 1)
                    <form class="favorite-form" action="/remove" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="shop_id" value="{{ $shopArray[$id]['id'] }}">
                        <button class="card__content-btn-favorite--off" type="submit">❤</button>
                    </form>
                    @else
                    <form class="favorite-form" action="/favorite" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="shop_id" value="{{ $shopArray[$id]['id'] }}">
                        <button class="card__content-btn-favorite--on" type="submit">❤</button>
                    </form>
                    @endif
                </div>
            </div>
    </div>
    @endfor
</div>
</div>
@endsection