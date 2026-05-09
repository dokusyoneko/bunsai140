document.querySelectorAll(".like__button").forEach((button) => {
    button.addEventListener("click", async () => {
        const novelId = button.dataset.novelId;
        const img = button.querySelector(".like__icon");
        const countSpan = button.parentElement.querySelector(".like__count");

        try {
            const response = await fetch(`/novels/${novelId}/like`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]',
                    ).content,
                    "Content-Type": "application/json",
                    // ★ これを追加
                    Accept: "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                },
                body: JSON.stringify({}),
            });

            // ★ 未ログイン時は 401 を検知してログイン画面へ
            if (response.status === 401) {
                window.location.href = "/login";
                return;
            }

            const data = await response.json();

            // ここは今 S さんの環境で正しく映っている形に合わせてOK
            img.src = data.liked ? "/img/favorite2.png" : "/img/favorite1.png";

            countSpan.textContent = data.likes_count;
            button.dataset.liked = data.liked ? "1" : "0";
        } catch (e) {
            console.error("like エラー:", e);
        }
    });
});
