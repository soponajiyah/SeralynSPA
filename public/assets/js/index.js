const hero = document.querySelector(".hero");
const reveals = document.querySelectorAll(
    ".reveal, .reveal-left, .reveal-right, .reveal-zoom"
);

function revealSection(){
    const windowHeight = window.innerHeight;

    reveals.forEach((item)=>{
        const top = item.getBoundingClientRect().top;
        const point = 120;

        if(top < windowHeight - point){
            item.classList.add("active");
        }
    });
}

document.addEventListener("mousemove", (e) => {
    const x = (window.innerWidth / 2 - e.pageX) / 90;
    const y = (window.innerHeight / 2 - e.pageY) / 90;
    hero.style.backgroundPosition = `${50 + x}% ${50 + y}%`;
});

window.addEventListener("scroll", revealSection);
revealSection();

const currentPage = window.location.pathname.split("/").pop();
const navLinks = document.querySelectorAll("nav a");

navLinks.forEach(link => {
    const href = link.getAttribute("href").split("/").pop();

    if(href === currentPage){
        link.classList.add("active");
    }

    link.addEventListener("click", event => {
        const url = link.getAttribute("href");
        if(url && url !== "#" && !url.startsWith("mailto:")){
            event.preventDefault();
            document.body.classList.add("page-leaving");
            setTimeout(() => {
                window.location.href = url;
            }, 400);
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("loaded");
});
