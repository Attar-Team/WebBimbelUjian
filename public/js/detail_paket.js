window.addEventListener("scroll", function() {
    var scroll = window.scrollY;
    var detail_paketterbang = document.querySelector(".detail_paketkanan_terbang");
    var detail_paket = document.querySelector(".detail_paketkanan");

    detail_paket.classList.toggle("active", scroll >= 5 );
    // detail_paket.classList.toggle("active", scroll >= 5 && scroll <= (document.documentElement.scrollHeight - window.innerHeight - 80));
    // detail_paket.classList.toggle("berhenti", scroll >= (document.documentElement.scrollHeight - window.innerHeight - 80));
    detail_paketterbang.classList.toggle("active", scroll >= 5);

});