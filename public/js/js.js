// Get the filter toggle button and sidebar
const filterButton = document.getElementById("filterButton");
const sidebar = document.getElementById("sidebar");

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

const checkboxes = document.querySelectorAll('.sidebar input[type="checkbox"]');
const cards = document.querySelectorAll('.card');

checkboxes.forEach(cb => {
  cb.addEventListener('change', () => {
    // نجيب الفلاتر المتعلم عليها ونفصلها حسب النوع (category / level)
    const selectedCategories = [...checkboxes]
      .filter(c => c.checked && (c.value === 'ai' || c.value === 'web' || c.value === 'Frontend' || c.value === 'Backend' ||c.value === 'data'||c.value==="Career Tips" ))
      .map(c => c.value);

    const selectedLevels = [...checkboxes]
      .filter(c => c.checked && (c.value === 'beginner' || c.value === 'intermediate' || c.value === 'advanced'))
      .map(c => c.value);

    cards.forEach(card => {
      const cardCategory = card.dataset.category;
      const cardLevel = card.dataset.level;

      const matchCategory = selectedCategories.length === 0 || selectedCategories.includes(cardCategory);
      const matchLevel = selectedLevels.length === 0 || selectedLevels.includes(cardLevel);

      // يظهر الكارد فقط لو بيحقق الشرطين معًا
      card.style.display = matchCategory && matchLevel ? 'block' : 'none';
    });
  });
});

// Add an event listener to the search box input
const searchBox = document.querySelector('.search-box');

searchBox.addEventListener('input', (e) => {
  const searchTerm = e.target.value.toLowerCase();

  // Get all the course card elements
  const courses = document.querySelectorAll('.card');

  // Loop through each course card and check if it matches the search term
  courses.forEach((course) => {
    const courseText = course.textContent.toLowerCase();
    if (courseText.includes(searchTerm)) {
      course.style.display = 'block';
    } else {
      course.style.display = 'none';
    }
  });
});