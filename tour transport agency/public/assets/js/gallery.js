function openGallery(images) {
    let carouselInner = document.querySelector("#galleryCarousel .carousel-inner");
    let modalElement = document.getElementById("galleryModal");
    let galleryOverlay = document.querySelector(".gallery-overlay");

    // Clear previous images
    carouselInner.innerHTML = '';

    // Populate the gallery carousel with images
    images.forEach((image, index) => {
        let activeClass = index === 0 ? 'active' : '';
        let imgElement = `<div class="carousel-item ${activeClass}">
                                <img src="/assets/images/excursions/${image}" class="d-block w-100" alt="Gallery Image">
                              </div>`;
        carouselInner.innerHTML += imgElement;
    });

    // Show Bootstrap modal
    let modal = new bootstrap.Modal(modalElement);
    modal.show();

    // Add dark background overlay
    galleryOverlay.classList.add("active");

    // Close event to remove overlay
    modalElement.addEventListener("hidden.bs.modal", () => {
        galleryOverlay.classList.remove("active");
    });
}

