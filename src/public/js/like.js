document.querySelectorAll(".like-button").forEach((button) => {
    button.addEventListener("click", async () => {
        const novelId = button.dataset.novelId;
        const img = button.querySelector(".like-icon");
        const countSpan = button.parentElement.querySelector(".like-count");

        const response = await fetch(`/novels/${novelId}/like`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({}),
        });

        const data = await response.json();

        img.src = data.liked ? "/favorite2.png" : "/favorite1.png";

        countSpan.textContent = data.likes_count;

        button.dataset.liked = data.liked ? "1" : "0";
    });
});
