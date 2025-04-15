// Get the filter toggle button and sidebar
const filterButton = document.getElementById("filterButton");
const sidebar = document.getElementById("sidebar");
const searchBox = document.querySelector(".search-box");  // Corrected this line

// Function to toggle sidebar visibility
filterButton.addEventListener("click", function() {
    // Toggle the sidebar's visibility
    if (sidebar.style.display === "none" || sidebar.style.display === "") {
        sidebar.style.display = "block";  // Show the sidebar
    } else {
        sidebar.style.display = "none";   // Hide the sidebar
    }
});

// Function to show/hide the filter button based on screen width
function handleFilterButtonVisibility() {
    if (window.innerWidth <= 768) {
        filterButton.style.display = "block";  // Show the button on small screens
    } else {
        filterButton.style.display = "none";   // Hide the button on larger screens
    }
}

// Call the function initially to set the button visibility
handleFilterButtonVisibility();

// Add event listener to handle resizing of the window
window.addEventListener("resize", handleFilterButtonVisibility);

const checkboxes = document.querySelectorAll('.sidebar input[type="checkbox"]');
const cards = document.querySelectorAll('.card');

checkboxes.forEach(cb => {
  cb.addEventListener('change', () => {
    const activeFilters = [...checkboxes].filter(c => c.checked).map(c => c.value);

    cards.forEach(card => {
      const matches = activeFilters.length === 0 || activeFilters.some(filter =>
        card.dataset.topic === filter || card.dataset.level === filter  // Fixed data attribute names
      );

      card.style.display = matches ? 'block' : 'none';
    });
  });
});

// Add an event listener to the search box input
searchBox.addEventListener('input', (e) => {
  const searchTerm = e.target.value.toLowerCase();

  // Get all the article card elements
  const articles = document.querySelectorAll('.card');

  // Loop through each article card and check if it matches the search term
  articles.forEach((article) => {
    const articleText = article.textContent.toLowerCase();
    if (articleText.includes(searchTerm)) {
      article.style.display = 'block';
    } else {
      article.style.display = 'none';
    }
  });
});
