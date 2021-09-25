/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
// --- JavaScript shared by all pages ---
var topButton = document.querySelector("#BackToTopButton"); // Navigation button listener

document.querySelector("#nav-button").addEventListener("click", function () {
  document.querySelector("#main-nav").classList.toggle("hidden");
}); // Back to top button listener

topButton.addEventListener("click", function () {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}); // Show back to top button on scroll

window.addEventListener("scroll", function () {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    topButton.style.display = "block";
  } else {
    topButton.style.display = "none";
  }
});
/******/ })()
;