<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PiGLy')</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/app.css') }}">
    @yield('head')
</head>
<body>
    <div class="container">
        <header class="header">
            <a href="/management" class="header__logo">
                <h1 class="header-logo__text logo">PiGLy</h1>
            </a>
        <div class="header__actions">
            <div class="action">
                <img src="/images/settings-icon.svg" alt="設定アイコン">
                <a href="/settings" class="action-button">目標体重設定</a>
            </div>
            <form class="action" method="post" action="/logout">
                @csrf
                <img src="/images/logout-icon.svg" alt="ログアウトアイコン">
                <button type="submit" class="action-button">ログアウト</button>
            </form>
        </div>
        </header>
        <main class="main">
            @yield('content')
        </main>
    </div>
</body>
</html>
