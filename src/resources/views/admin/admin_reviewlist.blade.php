@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/admin_reviewlist.css') }}" />
@endsection

@section('content')
<div class="newreview-list__content">
    <div class="delete__button">
        <button type="button" class="back__btn" onClick="history.back()">＜</button>
    </div>
    @for ($id = 0;$id < $shopCount;$id++)
        <div class="delete__button">
        <a href="/admin/newreview/{{ $shop[$id]['id'] }}" class="delete__link">{{ $shop[$id]['name'] }}</a>
</div>
@endfor
</div>
@endsection