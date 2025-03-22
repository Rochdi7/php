document.addEventListener("DOMContentLoaded", function () {
    // Sidebar Toggle
    const sidebar = document.querySelector(".sidebar");
    const sidebarToggle = document.querySelector(".menu-toggle");
    const closeSidebar = document.querySelector(".close-sidebar");

    if (sidebarToggle && closeSidebar) {
        sidebarToggle.addEventListener("click", function () {
            sidebar.classList.add("active");
        });

        closeSidebar.addEventListener("click", function () {
            sidebar.classList.remove("active");
        });
    }

    // Dropdown Hover Animation for Desktop
    const dropdowns = document.querySelectorAll(".nav-item.dropdown");
    dropdowns.forEach((dropdown) => {
        dropdown.addEventListener("mouseenter", function () {
            let menu = this.querySelector(".dropdown-menu");
            if (menu) {
                menu.classList.add("show");
            }
        });

        dropdown.addEventListener("mouseleave", function () {
            let menu = this.querySelector(".dropdown-menu");
            if (menu) {
                menu.classList.remove("show");
            }
        });
    });
});

