@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative/representative_reservation.css') }}" />
@endsection

@section('content')
<div class="reservation__content">
    <h2 class="reservation__shop">{{ $shop_id->name }}</h2>
    <div class="reservation__list">
        @if ($reservation != 'null')
        <table class="reservationlist-table">
            <tr class="reservationlist-table__row">
                <th class="reservationlist-table__title">
                    日付
                </th>
                <th class="reservationlist-table__title">
                    時間
                </th>
                <th class="reservationlist-table__title">
                    予約名
                </th>
                <th class="reservationlist-table__title">
                    人数
                </th>
                <th class="reservationlist-table__title">
                    来店ステータス
                </th>
                <th class="reservationlist-table__title">
                    支払いステータス
                </th>
            </tr>
            @for ($id=0;$id < $reservationCount; $id++)
                <tr class="reservationlist-table__row">
                <td class="reservationlist-table__item--date">
                    {{ $reservation[$id]['date'] }}
                </td>
                <td class="reservationlist-table__item--time">
                    {{ $reservation[$id]['time'] }}
                </td>
                <td class="reservationlist-table__item--name">
                    {{ $reservation[$id]['user']['name'] }}
                </td>
                <td class="reservationlist-table__item--number">
                    {{ $reservation[$id]['number'] }}
                </td>
                <td class="reservationlist-table__item--visit">
                    {{ $reservation[$id]['visit_flag'] }}
                </td>
                <td class="reservationlist-table__item--payment">
                    {{ $reservation[$id]['payment_flag'] }}
                </td>
                @endfor
        </table>
        @endif
    </div>
</div>
@endsection