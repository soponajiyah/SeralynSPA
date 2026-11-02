
/* ================= PAGE LOAD ================= */

document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("loaded");
});


/* ================= HERO PARALLAX ================= */

const hero = document.querySelector(".treatment-hero");

if (hero) {
    document.addEventListener("mousemove", (e) => {
        const x = (window.innerWidth / 2 - e.pageX) / 100;
        const y = (window.innerHeight / 2 - e.pageY) / 100;

        hero.style.backgroundPosition = `${50 + x}% ${50 + y}%`;
    });
}


/* ================= REVEAL ================= */

const reveals = document.querySelectorAll(".reveal");

function revealSection() {
    const windowHeight = window.innerHeight;

    reveals.forEach(item => {
        const top = item.getBoundingClientRect().top;

        if (top < windowHeight - 100) {
            item.classList.add("active");
        }
    });
}

window.addEventListener("scroll", revealSection);
window.addEventListener("load", revealSection);


/* ================= FILTER & SEARCH ================= */

const filterButtons = document.querySelectorAll(".filter-btn");
const categories = document.querySelectorAll(".treatment-category");

const searchInput = document.getElementById("treatmentSearch");
const clearSearch = document.getElementById("clearSearch");
const noResults = document.getElementById("noTreatmentResults");

let activeFilter = "all";


/* APPLY FILTER AND SEARCH */

function applyFilters() {

    const keyword = searchInput
        ? searchInput.value.toLowerCase().trim()
        : "";

    let totalResults = 0;

    categories.forEach(category => {

        const categoryType = category.dataset.category;

        const cards = category.querySelectorAll(".treatment-card");

        let categoryResults = 0;

        // Check selected category

        const categoryMatches =
            activeFilter === "all" ||
            categoryType === activeFilter;


        cards.forEach(card => {

            // Get all text inside treatment card

            const treatmentText = card.textContent.toLowerCase();

            // Check search keyword

            const matchesSearch = treatmentText.includes(keyword);

            // Combine category and search

            const showCard =
                categoryMatches && matchesSearch;

            card.style.display = showCard ? "" : "none";

            if (showCard) {
                categoryResults++;
                totalResults++;
            }

        });


        // Hide category if no matching treatment

        category.style.display =
            categoryResults > 0 ? "block" : "none";

    });


    // Show or hide no results message

    if (noResults) {
        noResults.hidden = totalResults > 0;
    }


    // Show or hide clear button

    if (clearSearch && searchInput) {
        clearSearch.hidden = searchInput.value.length === 0;
    }

}


/* CATEGORY BUTTONS */

filterButtons.forEach(button => {

    button.addEventListener("click", () => {

        activeFilter = button.dataset.filter;

        // Remove active class from all buttons

        filterButtons.forEach(btn => {
            btn.classList.remove("active");
        });

        // Activate selected button

        button.classList.add("active");

        // Apply selected filter

        applyFilters();

    });

});


/* SEARCH INPUT */

if (searchInput) {

    searchInput.addEventListener("input", () => {

        applyFilters();

    });

}


/* CLEAR SEARCH */

if (clearSearch && searchInput) {

    clearSearch.addEventListener("click", () => {

        searchInput.value = "";

        applyFilters();

        searchInput.focus();

    });

}


/* INITIAL FILTER */

applyFilters();


/* ================= CATEGORY ANCHOR ================= */

const hash = window.location.hash;

if (hash) {

    const filterName = hash.substring(1);

    const targetButton = document.querySelector(
        `.filter-btn[data-filter="${filterName}"]`
    );

    const targetCategory = document.getElementById(filterName);

    if (targetButton && targetCategory) {

        setTimeout(() => {

            // Activate the category filter

            targetButton.click();

            // Scroll directly to selected category

            targetCategory.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });

        }, 500);

    }

}


/* ================= NAVIGATION ================= */

const currentPage = window.location.pathname
    .split("/")
    .pop();

const navLinks = document.querySelectorAll("nav a");

navLinks.forEach(link => {

    const href = link.getAttribute("href");

    if (!href || href === "#") {
        return;
    }

    const cleanHref = href.split("/").pop();

    if (cleanHref === currentPage) {
        link.classList.add("active");
    }

    link.addEventListener("click", event => {

        if (
            href === "#" ||
            href.startsWith("mailto:") ||
            href.startsWith("https")
        ) {
            return;
        }

        event.preventDefault();

        document.body.classList.add("page-leaving");

        setTimeout(() => {

            window.location.href = href;

        }, 400);

    });

});


/* ================= HEADER SCROLL ================= */

const header = document.querySelector("header");

if (header) {

    window.addEventListener("scroll", () => {

        if (window.scrollY > 50) {

            header.style.background = "rgba(32,25,25,.72)";
            header.style.backdropFilter = "blur(12px)";

        } else {

            header.style.background = "rgba(121,107,107,.437)";
            header.style.backdropFilter = "blur(7px)";

        }

    });

}
