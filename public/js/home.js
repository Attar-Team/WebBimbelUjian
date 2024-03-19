// document.addEventListener("DOMContentLoaded", function() {
window.addEventListener("scroll", function() {
    var navbar = document.querySelector("nav");
    var scroll = window.scrollY;

    // Change position to absolute when scroll is greater than or equal to 20px
    navbar.classList.toggle("active", scroll >= 1);
    //   else {
    //   navbar.classList.remove("active");
    // }
  });
//   });