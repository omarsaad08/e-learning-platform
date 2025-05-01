const searchBox = document.querySelector(".search-box");
const categoryCheckboxes = document.querySelectorAll(".category-filter");
const levelCheckboxes = document.querySelectorAll(
    '.filter-group input[type="checkbox"][value]'
);
const cards = document.querySelectorAll(".card.h-100");

function filterCourses() {
    const searchQuery = searchBox.value.toLowerCase();
    const selectedCategories = Array.from(categoryCheckboxes)
        .filter((checkbox) => checkbox.checked)
        .map((cb) => cb.value.toLowerCase());

    const selectedLevels = Array.from(levelCheckboxes)
        .filter(
            (cb) =>
                ["beginner", "intermediate", "advanced"].includes(cb.value) &&
                cb.checked
        )
        .map((cb) => cb.value.toLowerCase());

    cards.forEach((card) => {
        const title = card.querySelector(".card-title").textContent.toLowerCase();
        const category = card.getAttribute("data-category")?.toLowerCase();
        const level = card.getAttribute("data-level")?.toLowerCase();

        const matchesSearch = title.includes(searchQuery);
        const matchesCategory =
            selectedCategories.length === 0 || selectedCategories.includes(category);
        const matchesLevel =
            selectedLevels.length === 0 || selectedLevels.includes(level);

        if (matchesSearch && matchesCategory && matchesLevel) {
            card.parentElement.style.display = "";
        } else {
            card.parentElement.style.display = "none";
        }
    });
}

// Event listeners
searchBox.addEventListener("input", filterCourses);
categoryCheckboxes.forEach((cb) =>
    cb.addEventListener("change", filterCourses)
);
levelCheckboxes.forEach((cb) => cb.addEventListener("change", filterCourses));
