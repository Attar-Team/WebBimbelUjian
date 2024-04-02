window.addEventListener("scroll", function() {
    var navbar = document.querySelector("nav");
    var sidebar = document.querySelector(".sidebar");
    var sidebar_terbang = document.querySelector(".sidebar_terbang");
var scroll = window.scrollY;

// Change position to absolute when scroll is greater than or equal to 20px
navbar.classList.toggle("active", scroll >= 1);
sidebar.classList.toggle("active", scroll >= 1);
sidebar_terbang.classList.toggle("active", scroll >= 1);
});