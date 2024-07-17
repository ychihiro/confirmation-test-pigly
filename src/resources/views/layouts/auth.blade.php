<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PiGLy')</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/auth.css') }}">
    @yield('head')
</head>
<body>
    <main class="auth">
        <div class="auth__container">
            <div class="auth__title-box">
                <h1 class="auth__logo logo">PiGLy</h1>
                <p class="auth__title">@yield('title')</p>
                <p class="auth__label">@yield('label')</p>
            </div>
            @yield('content')
        </div>
    </main>
</body>
</html>
