@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative/representative_create.css') }}" />
@endsection

@section('content')
<div class="create__content">
    <div class="shop__create">
        <form class="create-form" action="/representative/create/create" enctype="multipart/form-data" method="post">
            @csrf
            <div class="create-form__group">
                <input type="text" name="name" placeholder="店名" value="{{ old('name') }}">
            </div>
            <div class="error-message__group">
                <p class="create-form__error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="create-form__group">
                <div class="select__pointer">
                    <select name="areas">
                        <option value="">地域</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area['id'] }}" @if(old('areas')==$area['id']) selected @endif>{{ $area['area'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="error-message__group">
                <p class="create-form__error-message">
                    @error('areas')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="create-form__group">
                <div class="select__pointer">
                    <select name="genres">
                        <option value="">ジャンル</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre['id'] }}" @if(old('genres')==$genre['id'] ) selected @endif>{{ $genre['genre'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="error-message__group">
                <p class="create-form__error-message">
                    @error('genres')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="create-form__group">
                <textarea name="overview" placeholder="店舗概要" rows="5" cols="80">{{ old('overview') }}</textarea>
            </div>
            <div class="error-message__group">
                <p class="create-form__error-message">
                    @error('overview')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="create-form__group">
                <input type="file" name="image" accept=".jpg">
            </div>
            <div class="error-message__group">
                <p class="create-form__error-message">
                    @error('image')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="create-form__group__button">
                <input type="hidden" name="representative_id" value="{{ $representative_id }}">
                <button class="create-form__button" type="submit">
                    作成
                </button>
            </div>
        </form>
    </div>
</div>
@endsection