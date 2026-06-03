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
    <div class="bg-left"></div>
    <div class="bg-right"></div>

    <header class="header">
        <a href="/novel">
            <img src="{{ asset('img/headerlogo.png') }}" class="logo" alt="ヘッダーロゴ画像">
        </a>
        <nav class="nav">
            <div id="menu__button" class="menu-trigger">
                <img src="{{ asset('img/nav.png') }}" class="nav__img" alt="menu画像">
                @guest
                <div class="menu-label">メニュー ❘ ログイン</div>
                @endguest
                @auth
                <div class="menu-label">メニュー ❘ ログアウト</div>
                @endauth
            </div>
        </nav>
    </header>

    <div id="menu-overlay" class="menu-overlay hidden">
        <div class="menu-box">
            <img src="{{ asset('img/icon0.png') }}" class="menu-close" id="menu-close">

            <ul class="menu-list">
                <li>
                    <a href="/novel">
                        <img src="{{ asset('img/icon1.png') }}">
                        作品一覧
                    </a>
                </li>
                <li>
                    <a href="/novel_create">
                        <img src="{{ asset('img/icon2.png') }}">
                        執筆を始める
                    </a>
                </li>
                <li>
                    <a href="/mypage">
                        <img src="{{ asset('img/icon3.png') }}">
                        書斎
                    </a>
                </li>
                <li>
                    <a href="/news">
                        <img src="{{ asset('img/icon4.png') }}">
                        お知らせ
                    </a>
                </li>
                @guest
                <li>
                    <a href="/login">
                        <img src="{{ asset('img/icon5.png') }}">
                        入室(ログイン)
                    </a>
                </li>
                @endguest
                @auth
                <li>
                    <a href="#" id="logout-link">
                        <img src="{{ asset('img/icon5.png') }}">
                        退室(ログアウト)
                    </a>

                    <form id="logout-form" action="/logout" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>

    <main class="main__contents">
        @yield('content')
    </main>

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

        document.getElementById('logout-link').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('logout-form').submit();
        });

    </script>

    <script src="{{ asset('js/like.js') }}"></script>


</body>
</html>
