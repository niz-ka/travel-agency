/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/slider.js ***!
  \********************************/
var timer = null;

function prev() {
  var currentSlide = document.querySelector(".slider .current");
  var prevSlide = currentSlide.previousElementSibling;
  currentSlide.classList.remove("current");

  if (prevSlide && prevSlide.tagName.toLowerCase() == "div") {
    prevSlide.classList.add("current");
  } else {
    document.querySelector(".slider").lastElementChild.classList.add("current");
  }
}

function next() {
  var currentSlide = document.querySelector(".slider .current");
  var nextSlide = currentSlide.nextElementSibling;
  currentSlide.classList.remove("current");

  if (nextSlide) {
    nextSlide.classList.add("current");
  } else {
    document.querySelectorAll(".slider .slide")[0].classList.add("current");
  }
}

document.querySelector(".slider .prev").addEventListener("click", function () {
  clearInterval(timer);
  next();
});
document.querySelector(".slider .next").addEventListener("click", function () {
  clearInterval(timer);
  prev();
});
window.addEventListener("load", function () {
  var duration = document.querySelector(".slider").getAttribute("slider-duration");

  if (duration) {
    timer = setInterval(next, duration);
  } else {
    timer = setInterval(next, 5000);
  }
});
/******/ })()
;