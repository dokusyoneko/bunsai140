<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>140字小説 文彩</title>
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>
<body>
    <div class="bg-left"></div>
    <div class="bg-right"></div>

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
                <li>
                    <a href="/login">
                        <img src="{{ asset('icon5.png') }}">
                        入室
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <main class="main__content">
        <div class="thanks__box">
            <h2>投稿完了</h2>
            <div>執筆お疲れ様でした。</div>
            <button>作品一覧へ戻る</button>
        </div>
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

</body>
</html>