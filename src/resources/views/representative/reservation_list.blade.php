@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative/reservation_list.css') }}" />
@endsection

@section('content')
<div class="reservation-list__content">
    @for ($id = 0;$id < $shopCount;$id++)
        <div class="reservation__button">
        <a href="/representative/reservation/{{ $shop[$id]['id'] }}" class="reservation__link">{{ $shop[$id]['name'] }}</a>
</div>
@endfor
</div>
@endsection