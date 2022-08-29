
const btn = document.getElementById("menu-btn")
const nav = document.getElementById("menu")
const hero = document.getElementById("hero");
btn.addEventListener("click", () => {
    btn.classList.toggle("open");
    nav.classList.toggle("flex");
    nav.classList.toggle("hidden");
    // hero.classList.toggle("menu-open");
});


