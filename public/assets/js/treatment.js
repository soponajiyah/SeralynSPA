/* ================= PAGE LOAD ================= */

document.addEventListener("DOMContentLoaded", () => {

    document.body.classList.add("loaded");

});


/* ================= HERO PARALLAX ================= */

const hero =
    document.querySelector(".treatment-hero");


if(hero){

    document.addEventListener("mousemove", (e) => {

        const x =
            (window.innerWidth / 2 - e.pageX) / 100;

        const y =
            (window.innerHeight / 2 - e.pageY) / 100;

        hero.style.backgroundPosition =
            `${50 + x}% ${50 + y}%`;

    });

}


/* ================= REVEAL ================= */

const reveals =
    document.querySelectorAll(".reveal");


function revealSection(){

    const windowHeight =
        window.innerHeight;

    reveals.forEach(item => {

        const top =
            item.getBoundingClientRect().top;

        if(top < windowHeight - 100){

            item.classList.add("active");

        }

    });

}


window.addEventListener(
    "scroll",
    revealSection
);

window.addEventListener(
    "load",
    revealSection
);


/* ================= FILTER ================= */

const filterButtons =
    document.querySelectorAll(".filter-btn");

const categories =
    document.querySelectorAll(".treatment-category");


filterButtons.forEach(button => {

    button.addEventListener("click", () => {

        const filter =
            button.dataset.filter;


        filterButtons.forEach(btn => {

            btn.classList.remove("active");

        });


        button.classList.add("active");


        categories.forEach(category => {

            const categoryType =
                category.dataset.category;


            if(
                filter === "all" ||
                categoryType === filter
            ){

                category.style.display = "block";

                setTimeout(() => {

                    category.style.opacity = "1";
                    category.style.transform =
                        "translateY(0)";

                }, 50);

            }

            else{

                category.style.display = "none";

            }

        });

    });

});


/* ================= CATEGORY ANCHOR ================= */

const hash = window.location.hash;

if(hash){

    const filterName = hash.substring(1);

    const targetButton = document.querySelector(
        `.filter-btn[data-filter="${filterName}"]`
    );

    if(targetButton){

        setTimeout(() => {

            targetButton.click();

            document.querySelector(".category-filter").scrollIntoView({
                behavior: "smooth",
                block: "center"
            });

        }, 500);

    }

}


/* ================= NAVIGATION ================= */

const currentPage =
    window.location.pathname
    .split("/")
    .pop();


const navLinks =
    document.querySelectorAll("nav a");


navLinks.forEach(link => {

    const href =
        link.getAttribute("href");


    if(!href || href === "#")
        return;


    const cleanHref =
        href.split("/").pop();


    if(cleanHref === currentPage){

        link.classList.add("active");

    }


    link.addEventListener("click", event => {

        if(
            href === "#" ||
            href.startsWith("mailto:") ||
            href.startsWith("https")
        ){

            return;

        }


        event.preventDefault();

        document.body.classList.add(
            "page-leaving"
        );


        setTimeout(() => {

            window.location.href =
                href;

        },400);

    });

});


/* ================= HEADER SCROLL ================= */

const header =
    document.querySelector("header");


window.addEventListener("scroll", () => {

    if(window.scrollY > 50){

        header.style.background =
            "rgba(32,25,25,.72)";

        header.style.backdropFilter =
            "blur(12px)";

    }

    else{

        header.style.background =
            "rgba(121,107,107,.437)";

        header.style.backdropFilter =
            "blur(7px)";

    }

});