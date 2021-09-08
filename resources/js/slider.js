let timer = null;

function prev() {
    const currentSlide = document.querySelector(".slider .current");
    const prevSlide = currentSlide.previousElementSibling;

    currentSlide.classList.remove("current");

    if (prevSlide && prevSlide.tagName.toLowerCase() == "div") {
        prevSlide.classList.add("current");
    } else {
        document
            .querySelector(".slider")
            .lastElementChild.classList.add("current");
    }
}

function next() {
    const currentSlide = document.querySelector(".slider .current");
    const nextSlide = currentSlide.nextElementSibling;

    currentSlide.classList.remove("current");

    if (nextSlide) {
        nextSlide.classList.add("current");
    } else {
        document.querySelectorAll(".slider .slide")[0].classList.add("current");
    }
}

document.querySelector(".slider .prev").addEventListener("click", () => {
    clearInterval(timer);
    next();
});
document.querySelector(".slider .next").addEventListener("click", () => {
    clearInterval(timer);
    prev();
});

window.addEventListener("load", () => {
    const duration = document
        .querySelector(".slider")
        .getAttribute("slider-duration");

    if (duration) {
        timer = setInterval(next, duration);
    } else {
        timer = setInterval(next, 5000);
    }
});
