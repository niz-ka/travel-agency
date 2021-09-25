// --- JavaScript shared by all pages ---
const topButton = document.querySelector("#BackToTopButton");

// Navigation button listener
document.querySelector("#nav-button").addEventListener("click", () => {
    document.querySelector("#main-nav").classList.toggle("hidden");
});

// Back to top button listener
topButton.addEventListener("click", () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});

// Show back to top button on scroll
window.addEventListener("scroll", () => {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        topButton.style.display = "block";
    } else {
        topButton.style.display = "none";
    }
});
