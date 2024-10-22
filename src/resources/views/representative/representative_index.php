@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/admin_login.css') }}" />
@endsection

@section('content')
<div class="representative__logout">
    <form method="post" action="{{ route('representative.login.destroy') }}">
        @method('DELETE')
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</div>
@endsection