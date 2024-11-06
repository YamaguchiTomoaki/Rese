@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative/edit_list.css') }}" />
@endsection

@section('content')
<div class="edit-list__content">
    @for ($id = 0;$id < $shopCount;$id++)
        <div class="edit__button">
        <a href="/representative/edit/{{ $shop[$id]['id'] }}" class="edit__link">{{ $shop[$id]['name'] }}</a>
</div>
@endfor
</div>
@endsection