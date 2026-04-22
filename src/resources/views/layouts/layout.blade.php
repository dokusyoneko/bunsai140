<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>140字小説 文彩</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @yield('css')
</head>

<body>
    <!-- 背景 -->
    <div class="bg-left"></div>
    <div class="bg-right"></div>

    <!-- ヘッダー -->
    <header class="header">
        <a href="/novel">
            <img src="{{ asset('headerlogo.png') }}" class="logo" alt="ヘッダーロゴ画像">
        </a>
        <nav class="nav">
            <div id="menu__button" class="menu-trigger">
                <img src="{{ asset('nav.png') }}" class="nav__img" alt="menu画像">
            </div>
        </nav>
    </header>

    <!-- メニュー -->
    <div id="menu-overlay" class="menu-overlay hidden">
        <div class="menu-box">
            <img src="{{ asset('icon0.png') }}" class="menu-close" id="menu-close">

            <ul class="menu-list">
                <li>
                    <a href="/novel">
                        <img src="{{ asset('icon1.png') }}">
                        作品一覧
                    </a>
                </li>
                <li>
                    <a href="/novel_create">
                        <img src="{{ asset('icon2.png') }}">
                        執筆を始める
                    </a>
                </li>
                <li>
                    <a href="/mypage">
                        <img src="{{ asset('icon3.png') }}">
                        書斎
                    </a>
                </li>
                <li>
                    <a href="/news">
                        <img src="{{ asset('icon4.png') }}">
                        お知らせ
                    </a>
                </li>
                @guest
                <li>
                    <a href="/login">
                        <img src="{{ asset('icon5.png') }}">
                        入室
                    </a>
                </li>
                @endguest
                @auth
                <li>
                    <form action="/logout" method="POST">
                    @csrf
                        <button type="submit">
                            <img src="{{ asset('icon5.png') }}">
                            ログアウト
                        </button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>

    <!-- ページごとの内容 -->
    <main class="main__contents">
        @yield('content')
    </main>

    <!-- JS -->
    <script>
        const menuOverlay = document.getElementById('menu-overlay');
        const menuClose = document.getElementById('menu-close');
        const menuButton = document.getElementById('menu__button');

        menuButton.addEventListener('click', () => {
            menuOverlay.classList.add('active');
            menuOverlay.classList.remove('hidden');
        });

        menuClose.addEventListener('click', () => {
            menuOverlay.classList.remove('active');
            menuOverlay.classList.add('hidden');
        });
    </script>

    <script src="{{ asset('js/like.js') }}"></script>

</body>
</html>
