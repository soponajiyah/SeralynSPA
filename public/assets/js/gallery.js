// ================= HERO PARALLAX =================

const hero = document.querySelector(".gallery-hero");

if (hero) {
    document.addEventListener("mousemove", (e) => {
        const x = (window.innerWidth / 2 - e.pageX) / 90;
        const y = (window.innerHeight / 2 - e.pageY) / 90;

        hero.style.backgroundPosition =
            `${50 + x}% ${50 + y}%`;
    });
}


const reveals = document.querySelectorAll(
    ".reveal, .reveal-left, .reveal-right, .reveal-zoom"
);

function revealSection() {
    const windowHeight = window.innerHeight;

    reveals.forEach((item) => {
        const top = item.getBoundingClientRect().top;
        const point = 120;

        if (top < windowHeight - point) {
            item.classList.add("active");
        }
    });
}

window.addEventListener("scroll", revealSection);
window.addEventListener("load", revealSection);


const currentPage =
    window.location.pathname.split("/").pop();

const navLinks =
    document.querySelectorAll("nav a");

navLinks.forEach((link) => {
    const href =
        link.getAttribute("href")?.split("/").pop();

    if (href === currentPage) {
        link.classList.add("active");
    }
});



navLinks.forEach((link) => {

    link.addEventListener("click", (event) => {

        const url = link.getAttribute("href");

        if (
            url &&
            url !== "#" &&
            !url.startsWith("mailto:") &&
            !url.startsWith("https")
        ) {
            event.preventDefault();

            document.body.classList.add(
                "page-leaving"
            );

            setTimeout(() => {
                window.location.href = url;
            }, 400);
        }
    });

});

document.addEventListener(
    "DOMContentLoaded",
    () => {
        document.body.classList.add("loaded");
    }
);


const roomCards =
    document.querySelectorAll(".room-card");

roomCards.forEach((card) => {

    card.addEventListener("click", () => {

        if (window.innerWidth <= 1000) {

            roomCards.forEach((item) => {
                if (item !== card) {
                    item.classList.remove("active");
                }
            });

            card.classList.toggle("active");
        }

    });

});



window.addEventListener("load", () => {

    const heroContent =
        document.querySelector(
            ".gallery-hero-content"
        );

    if (heroContent) {
        heroContent.classList.add("active");
    }

});



const galleryItems =
    document.querySelectorAll(".gallery-item");

galleryItems.forEach((item) => {

    item.addEventListener("mouseenter", () => {
        item.style.transform =
            "translateY(-10px)";
        item.style.transition =
            ".6s";
    });

    item.addEventListener("mouseleave", () => {
        item.style.transform =
            "translateY(0)";
    });

});


const header =
    document.querySelector("header");

window.addEventListener("scroll", () => {

    if (window.scrollY > 50) {
        header.style.background =
            "rgba(32, 25, 25, 0.7)";
        header.style.backdropFilter =
            "blur(12px)";
    } else {
        header.style.background =
            "rgba(121, 107, 107, 0.437)";
        header.style.backdropFilter =
            "blur(7px)";
    }

});



const buttons =
    document.querySelectorAll(
        ".room-overlay a, .reservation-btn"
    );

buttons.forEach((button) => {

    button.addEventListener("click", function (e) {

        const x =
            e.clientX -
            e.target.getBoundingClientRect().left;

        const y =
            e.clientY -
            e.target.getBoundingClientRect().top;

        const circle =
            document.createElement("span");

        circle.style.left = x + "px";
        circle.style.top = y + "px";
        circle.classList.add("ripple");

        this.appendChild(circle);

        setTimeout(() => {
            circle.remove();
        }, 600);

    });

});

