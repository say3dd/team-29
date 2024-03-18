const dropdown = document.getElementById("cartDropdown");
const basketButton = document.getElementById("basket-button");

basketButton.addEventListener('click', function(e) {
    e.stopPropagation(); // Prevent event from propagating to other elements
    dropdown.classList.toggle("dropdown--active"); // Correctly toggle the active class to show/hide the dropdown
});
