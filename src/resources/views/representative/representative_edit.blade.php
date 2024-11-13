@extends('layouts.representative')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative/representative_edit.css') }}" />
@endsection

@section('content')
<form class="edit-form" action="/representative/edit/update" enctype="multipart/form-data" method="post">
    @csrf
    <div class="edit__content">
        <input type="hidden" name="shop_id" value="{{ $shopArray['id'] }}">
        <div class="edit-form__group">
            <button type="button" class="back__btn" onClick="history.back()">＜</button>
        </div>
        <div class="edit-form__group">
            <input type="text" name="name" value="{{ old('name',$shopArray['name']) }}">
        </div>
        <div class="error-message__group">
            <p class="edit-form__error-message">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-form__group">
            <div class="select__pointer">
                <select name="areas">
                    @foreach ($areas as $area)
                    <option value="{{ $area['id'] }}" @if(old('areas',$shopArray['areas'])==$area['id']) selected @endif>{{ $area['area'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="error-message__group">
            <p class="edit-form__error-message">
                @error('areas')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-form__group">
            <div class="select__pointer">
                <select name="genres">
                    @foreach ($genres as $genre)
                    <option value="{{ $genre['id'] }}" @if(old('genres',$shopArray['genres'])==$genre['id']) selected @endif>{{ $genre['genre'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="error-message__group">
            <p class="edit-form__error-message">
                @error('genres')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-form__group">
            <textarea name="overview">{{ old('overview',$shopArray['overview']) }}</textarea>
        </div>
        <div class="error-message__group">
            <p class="edit-form__error-message">
                @error('overview')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="edit-form__group__file">
            <input type="file" name="image" accept=".jpg">
        </div>
        <div class="error-message__group">
            <p class="edit-form__error-message">
                @error('image')
                {{ $message }}
                @enderror
            </p>
        </div>
    </div>
    <div class="edit-form__group__button">
        <button class="edit-form__button" type="submit">
            変更
        </button>
    </div>
</form>
@endsection