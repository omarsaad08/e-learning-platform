// Get elements
const filterButton = document.getElementById("filterButton");
const sidebar = document.getElementById("sidebar");
const searchBox = document.querySelector(".search-box");
const checkboxes = document.querySelectorAll('.sidebar input[type="checkbox"]');
const cards = document.querySelectorAll('.card');

// Toggle sidebar visibility on small screens
filterButton.addEventListener("click", () => {
    sidebar.style.display = (sidebar.style.display === "none" || sidebar.style.display === "") 
        ? "block" 
        : "none";
});

// Handle filter button visibility based on screen width
function handleFilterButtonVisibility() {
    filterButton.style.display = window.innerWidth <= 768 ? "block" : "none";
}
window.addEventListener("resize", handleFilterButtonVisibility);
handleFilterButtonVisibility(); // Call once on load

// Combined filter + search function
function applyFiltersAndSearch() {
    const activeFilters = [...checkboxes].filter(c => c.checked).map(c => c.value.toLowerCase());
    const searchTerm = searchBox.value.toLowerCase();

    cards.forEach(card => {
        const topic = card.dataset.topic?.toLowerCase() || '';
        const level = card.dataset.level?.toLowerCase() || '';
        const text = card.textContent.toLowerCase();

        const matchesFilter = activeFilters.length === 0 || activeFilters.includes(topic) || activeFilters.includes(level);
        const matchesSearch = text.includes(searchTerm);

        card.style.display = (matchesFilter && matchesSearch) ? 'block' : 'none';
    });
}

// Attach the combined filter+search to events
checkboxes.forEach(cb => cb.addEventListener('change', applyFiltersAndSearch));
searchBox.addEventListener('input', applyFiltersAndSearch);

// Apply filters on page load
window.addEventListener("DOMContentLoaded", applyFiltersAndSearch);
