const hamburger = document.getElementById("hamburger");

hamburger.addEventListener("click", () => {
    const div = document.querySelector("div#mobile-menu-2");

    div.classList.toggle("hidden");
});

const listMenu = document.querySelectorAll("ul#menu li");

listMenu.forEach((el) => {
    el.addEventListener("click", () => {
        // Hapus kelas "text-white" dari a dengan aria-current="page"
        const currentPage = document.querySelector('a[aria-current="page"]');
        if (currentPage) {
            currentPage.classList.remove("bg-white");
            currentPage.classList.add("text-gray-700", "dark:text-gray-700");
        }
        el.classList.add("text-[#1BC0DE]");
    });
});

// Dapatkan elemen tombol hamburger
var hamburgerBtn = document.getElementById("hamburger");

// Tambahkan event listener pada elemen tersebut
hamburgerBtn.addEventListener("click", function () {
    // Dapatkan elemen dengan id "mobile-menu-2"
    var mobileMenu = document.getElementById("mobile-menu-2");
    if (window.innerWidth < 640) {
        mobileMenu.classList.add("bg-[#1BC0DE]");
    } else {
        mobileMenu.classList.remove("bg-white");
    }
    // Tambahkan kelas "bg-[#0E3065]" pada elemen tersebut
});

const btn = document.getElementById("hamburger");
btn.addEventListener("click", () => {});
