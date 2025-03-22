/* section transport*/
    document.addEventListener("DOMContentLoaded", function () {
        const sections = document.querySelectorAll(".scroll-animation");

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    observer.unobserve(entry.target); // Prevents repeated animations
                }
            });
        }, { threshold: 0.2 }); // Trigger when 20% of section is visible

        sections.forEach(section => observer.observe(section));
    });

/* section offer*/
    document.addEventListener("DOMContentLoaded", function () {
        const offerCards = document.querySelectorAll(".card-offer");

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    observer.unobserve(entry.target); // Ensures animation runs only once
                }
            });
        }, { threshold: 0.2 }); // Triggers when 20% of the element is visible

        offerCards.forEach(card => observer.observe(card));
    });


    document.addEventListener("DOMContentLoaded", function () {
        const heroVideo = document.querySelector(".hero-video");
        const heroContent = document.querySelector(".hero-content");

        // Add 'loaded' class when video metadata is ready
        heroVideo.addEventListener("loadeddata", function () {
            heroVideo.classList.add("loaded");
            heroContent.classList.add("loaded");
        });
    });


    document.addEventListener("DOMContentLoaded", function () {
        const section = document.querySelector(".why-choose-us");
        const cards = document.querySelectorAll(".feature-card");
    
        function revealOnScroll() {
            const sectionPosition = section.getBoundingClientRect().top;
            const screenPosition = window.innerHeight - 100;
    
            if (sectionPosition < screenPosition) {
                section.style.opacity = "1"; // Make section visible
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add("animate");
                    }, index * 200); // Staggered effect
                });
            }
        }
    
        window.addEventListener("scroll", revealOnScroll);
    });
    
