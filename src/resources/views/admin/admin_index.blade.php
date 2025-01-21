@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/admin_index.css') }}" />
@endsection

@section('content')
<div class="admin__content">
    <div class="representative__create">
        <a class="representative__link" href="/admin/representative">店舗責任者を作成</a>
    </div>
    <div class="notification__email">
        <a class="email__link" href="/admin/email">お知らせメールを作成</a>
    </div>
    <div class="newreview__content">
        <a class="newreview__link" href="/admin/newreview">口コミの削除</a>
    </div>
    <div class="admin__logout">
        <form method="post" action="{{ route('admin.login.destroy') }}">
            @method('DELETE')
            @csrf
            <button type="submit">ログアウト</button>
        </form>
    </div>
</div>
@endsection