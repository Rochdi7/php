document.addEventListener("DOMContentLoaded", function () {
    const descriptionTab = document.getElementById("descriptionTab");
    const customerTab = document.getElementById("customerTab");
    const aboutText = document.getElementById("aboutText");
    const customerText = document.getElementById("customerText");

    function switchTab(activeTab, inactiveTab, showText, hideText) {
        activeTab.classList.add("active-tab", "text-primary");
        activeTab.classList.remove("text-secondary");
        inactiveTab.classList.remove("active-tab", "text-primary");
        inactiveTab.classList.add("text-secondary");
        showText.classList.remove("d-none");
        hideText.classList.add("d-none");
    }

    descriptionTab.addEventListener("click", function () {
        switchTab(descriptionTab, customerTab, aboutText, customerText);
    });

    customerTab.addEventListener("click", function () {
        switchTab(customerTab, descriptionTab, customerText, aboutText);
    });
});