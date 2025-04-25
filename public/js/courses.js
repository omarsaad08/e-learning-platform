
// Get DOM elements
const filterButton = document.getElementById("filterButton");
const sidebar = document.getElementById("sidebar");
const searchBox = document.querySelector(".search-box");

// Toggle sidebar visibility
filterButton.addEventListener("click", function() {
    if (sidebar.style.display === "none" || sidebar.style.display === "") {
        sidebar.style.display = "block";
    } else {
        sidebar.style.display = "none";
    }
});

// Handle filter button visibility based on screen size
function handleFilterButtonVisibility() {
    if (window.innerWidth <= 768) {
        filterButton.style.display = "block";
        sidebar.style.display = "none";
    } else {
        filterButton.style.display = "none";
        sidebar.style.display = "block";
    }
}

// Initialize button visibility
handleFilterButtonVisibility();

// Handle window resize
window.addEventListener("resize", handleFilterButtonVisibility);

// Filter topics
const topics = ['ai', 'web', 'Frontend', 'Backend', 'data', 'Career Tips'];
const levels = ['beginner', 'intermediate', 'advanced'];

// Filter functionality
const checkboxes = document.querySelectorAll('.sidebar input[type="checkbox"]');
const cards = document.querySelectorAll('.card');

function filterCards() {
    const selectedTopics = [...checkboxes]
        .filter(c => c.checked && topics.includes(c.value))
        .map(c => c.value);

    const selectedLevels = [...checkboxes]
        .filter(c => c.checked && levels.includes(c.value))
        .map(c => c.value);

    cards.forEach(card => {
        const cardTopic = card.dataset.topic; // Changed from category to topic
        const cardLevel = card.dataset.level;

        const matchTopic = selectedTopics.length === 0 || selectedTopics.includes(cardTopic);
        const matchLevel = selectedLevels.length === 0 || selectedLevels.includes(cardLevel);

        card.style.display = matchTopic && matchLevel ? 'block' : 'none';
    });
}

// Add change event listeners to checkboxes
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', filterCards);
});

// Search functionality
searchBox.addEventListener('input', (event) => {
    const searchTerm = event.target.value.toLowerCase();

    cards.forEach((card) => {
        const cardText = card.textContent.toLowerCase();
        const isVisible = cardText.includes(searchTerm);
        
        if (isVisible) {
            // Only show the card if it also matches the current filters
            filterCards();
        } else {
            card.style.display = 'none';
        }
    });
});