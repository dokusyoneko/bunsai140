<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>管理画面 - 文彩140</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @yield('css')
</head>

<body>

    <div class="bg-left"></div>
    <div class="bg-right"></div>


    <header class="header">
        <a href="/admin/novel">
            <img src="{{ asset('img/headerlogo.png') }}" class="logo" alt="ヘッダーロゴ画像">
        </a>
        <nav class="nav">
            <div id="menu__button" class="menu-trigger">
                <img src="{{ asset('img/nav.png') }}" class="nav__img" alt="menu画像">
                <div class="menu-label">メニュー</div>
            </div>
        </nav>
    </header>

    <div id="menu-overlay" class="menu-overlay hidden">
        <div class="menu-box">
            <img src="{{ asset('img/icon0.png') }}" class="menu-close" id="menu-close">

            <ul class="menu-list">
                <li>
                    <a href="/admin/novel">
                        <img src="{{ asset('img/icon1.png') }}">
                        作品管理
                    </a>
                </li>
                <li>
                    <a href="/admin/user">
                        <img src="{{ asset('img/icon3.png') }}">
                        利用者管理
                    </a>
                </li>
                <li>
                    <a href="/admin/news">
                        <img src="{{ asset('img/icon4.png') }}">
                        お知らせ管理
                    </a>
                </li>

                <li>
                    <a href="#" id="logout-link">
                        <img src="{{ asset('img/icon5.png') }}">
                        ログアウト
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
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

</body>
</html>
