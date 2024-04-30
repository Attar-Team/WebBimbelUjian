// document.addEventListener("DOMContentLoaded", function() {
window.addEventListener("scroll", function() {
    var navbar = document.querySelector("nav");
    var paket_terbang = document.querySelector(".paket_terbang");
    var paket_list = document.querySelector(".paket_list");
    
    
    var scroll = window.scrollY;

    // Change position to absolute when scroll is greater than or equal to 20px
    navbar.classList.toggle("active", scroll >= 1);
    paket_list.classList.toggle("active", scroll >= 230 && scroll <= (document.documentElement.scrollHeight - window.innerHeight - 30));
    paket_list.classList.toggle("halo", scroll >= (document.documentElement.scrollHeight - window.innerHeight - 30));
    paket_terbang.classList.toggle("active", scroll >= 230);
    //   else {
    //   navbar.classList.remove("active");
    // }


    

    
  });

//   document.addEventListener("DOMContentLoaded", function() {
//     var links = document.querySelectorAll("nav .links a");
//     links.forEach(function(link) {
//         link.addEventListener("click", function(event) {
            
//             links.forEach(function(otherLink) {
//                 otherLink.classList.remove("actives"); // Hapus kelas "active" dari semua tautan
//             });
//             link.classList.add("actives"); // Tambahkan kelas "active" ke tautan yang diklik
//         });
//     });
// });
//   });
