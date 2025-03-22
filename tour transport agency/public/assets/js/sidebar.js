document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".sidebar");
    const closeSidebarBtn = document.querySelector(".close-sidebar");
    const dropdownLinks = document.querySelectorAll(".sidebar .dropdown-toggle");

    // Close Sidebar Function
    closeSidebarBtn.addEventListener("click", function () {
        sidebar.classList.remove("active");
        document.body.classList.remove("no-scroll");

        // Close all open dropdowns when closing sidebar
        document.querySelectorAll(".sidebar .collapse").forEach(el => el.classList.remove("show"));
    });

    // Handle Mobile Dropdown Clicks
    dropdownLinks.forEach((dropdown) => {
        dropdown.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            
            let targetMenu = document.querySelector(this.getAttribute("data-target"));

            if (targetMenu.classList.contains("show")) {
                targetMenu.classList.remove("show"); // Close if already open
            } else {
                // Close all other dropdowns before opening a new one
                document.querySelectorAll(".sidebar .collapse").forEach(el => el.classList.remove("show"));
                targetMenu.classList.add("show"); // Open clicked dropdown
            }
        });
    });

    // Close Sidebar and Dropdowns When Clicking Outside
    document.addEventListener("click", function (event) {
        let isClickInsideSidebar = sidebar.contains(event.target) || event.target.closest(".menu-toggle");

        if (!isClickInsideSidebar) {
            sidebar.classList.remove("active");
            document.body.classList.remove("no-scroll");

            // Close all dropdowns when sidebar closes
            document.querySelectorAll(".sidebar .collapse").forEach(el => el.classList.remove("show"));
        }
    });
});