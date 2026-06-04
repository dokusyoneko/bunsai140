<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>140字小説 文彩</title>
    <link rel="stylesheet" href="/css/thanks.css">
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
                <li>
                    <a href="/login">
                        <img src="{{ asset('img/icon5.png') }}">
                        入室
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <main class="main__content">
        <div class="thanks__box">
            <h2 class="thanks__title">投稿完了</h2>
            <div class="thanks__message">執筆お疲れ様でした。</div>
            <a href="{{ url('/novel') }}" class="thanks__button">
            一覧へ戻る
            </a>
        </div>
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
    </script>

</body>
</html>