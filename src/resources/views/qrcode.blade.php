@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/qrcode.css') }}" />

@endsection

@section('content')
<div class="qrcode">{{ $qrCode }}</div>
@endsection