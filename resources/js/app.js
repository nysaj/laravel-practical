const backToTopButton = document.getElementById("back-to-top");

if (backToTopButton) {
    backToTopButton.addEventListener("click", () => {
        window.scrollTo({
            left: 0,
            top: 0,
            behavior: "smooth"
        })
    });
    window.addEventListener("scroll", () => {
        const scrollPosition = window.scrollY;

        if (scrollPosition >= 400) {
            backToTopButton.classList.remove("hidden")
        } else {
            backToTopButton.classList.add("hidden")
        }
    });
}
