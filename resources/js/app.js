function setBackToTopButton () {
    const backToTopButton = document.getElementById("back-to-top");
    
    if (!backToTopButton) {
        return;
    }

    backToTopButton.addEventListener("click", () => {
        window.scrollTo({
            left: 0,
            top: 0,
            behavior: "smooth"
        });
    });
    
    window.addEventListener("scroll", () => {
        const scrollPosition = window.scrollY;

        if (scrollPosition >= 400) {
            backToTopButton.classList.remove("hidden")
        } else {
            backToTopButton.classList.add("hidden")
        };
    });
};

document.addEventListener("DOMContentLoaded", setBackToTopButton);
document.addEventListener("livewire:navigated", setBackToTopButton);
