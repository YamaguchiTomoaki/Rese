<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <button type="button" class="back__btn" onClick="history.back()"><span class="batsu"></span></span></button>
        </div>
    </header>

    <main>
        <div class="nav__content">
            <a class="nav__home" href="/">Home</a>
            @if (Auth::check())
            <a class="nav__logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('login.destroy') }}" method="post" style="display: none;">
                @method('DELETE')
                @csrf
            </form>
            <a class="nav__mypage" href="/mypage">Mypage</a>
            @else
            <a class="nav__registration" href="/register">Registration</a>
            <a class="nav__login" href="/login">Login</a>
            @endif
        </div>
    </main>
</body>

</html>