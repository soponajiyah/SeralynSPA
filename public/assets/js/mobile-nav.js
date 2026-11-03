
document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.getElementById("mobileMenuBtn");
    const drawer = document.getElementById("mobileDrawer");
    const overlay = document.getElementById("mobileOverlay");
    const closeBtn = document.getElementById("drawerClose");

    if (!menuBtn || !drawer || !overlay || !closeBtn) {
        return;
    }

    function openMenu() {
        drawer.classList.add("open");
        overlay.classList.add("show");

        drawer.setAttribute("aria-hidden", "false");
        menuBtn.setAttribute("aria-expanded", "true");

        document.body.style.overflow = "hidden";
    }

    function closeMenu() {
        drawer.classList.remove("open");
        overlay.classList.remove("show");

        drawer.setAttribute("aria-hidden", "true");
        menuBtn.setAttribute("aria-expanded", "false");

        document.body.style.overflow = "";
    }

    menuBtn.addEventListener("click", openMenu);
    closeBtn.addEventListener("click", closeMenu);
    overlay.addEventListener("click", closeMenu);

    // Tutup menu setelah pengguna memilih halaman
    drawer.querySelectorAll("a").forEach(function (link) {
        link.addEventListener("click", closeMenu);
    });

    // Tutup menggunakan tombol Escape
    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            closeMenu();
        }
    });
});
