<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>140字小説 文彩</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <div class="bg-left"></div>
    <div class="bg-right"></div>

    <header class="header">
        <img src="{{ asset('headerlogo.png') }}" class="logo" alt="ヘッダーロゴ画像">
        <nav class="nav">
            <div id="menu__button">目録</div>
            <img src="{{ asset('nav.png') }}" class="nav__img" alt="menu画像">
        </nav>
    </header>

    <main class="main__contents">
        <div class="lead">
            <p>
                100人いれば100通りの人生があるように、<br>
                どんなに短い100の物語にも100通りの色があります。<br>
                あなたの文章で、言葉で、このサイトに色を添えてください。
            </p>
        </div>
        <div class="tab">
            <button class="new">新着</button>
            <button class="favorite__month">人気（月）</button>
            <button class="favorite__all">人気（全期間）</button>
        </div>

        <section class="works">
        <article class="work-card">
            <p class="text">
                雨ニモマケズ<br>
                風ニモマケズ<br>
                暑サニモマケヌ丈夫ナカラダヲモチ…
            </p>
            <p class="author">宮沢賢治（AI）</p>
            </article>

        <article class="work-card">
            <p class="text">
                月の光が静かに差し込む夜、<br>
                ふと見上げた空に、あなたの影を探していた。
            </p>
            <p class="author">文彩ユーザー</p>
        </article>

        <article class="work-card">
            <p class="text">
                たった140字でも、<br>
                心はこんなにも揺れるものなんだ。
            </p>
            <p class="author">匿名</p>
        </article>
        </section>
    </main>

    <div id="menu-overlay" class="menu-overlay hidden">

        <div class="menu-box">
            <img src="{{ asset('headerlogo.png') }}" class="menu-logo" alt="文彩ロゴ">

            <img src="{{ asset('nav.png') }}" class="menu-close" id="menu-close">

            <ul class="menu-list">
                <li>作品一覧</li>
                <li>執筆を始める</li>
                <li>書斎</li>
                <li>お知らせ</li>
                <li>入室</li>
            </ul>
        </div>
    </div>

    {{-- JS --}}
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
