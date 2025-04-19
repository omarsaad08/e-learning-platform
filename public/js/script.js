function applyFilters() {
  // Collect selected topics and levels
  const selectedTopics = [...checkboxes]
    .filter(c => c.checked && ['web', 'data', 'ai', 'frontend', 'backend', 'career tips'].includes(c.value.toLowerCase()))
    .map(c => c.value.toLowerCase());

  const selectedLevels = [...checkboxes]
    .filter(c => c.checked && ['beginner', 'intermediate', 'advanced'].includes(c.value.toLowerCase()))
    .map(c => c.value.toLowerCase());

  const searchTerm = searchBox.value.toLowerCase();

  cards.forEach(card => {
    const cardTopic = card.dataset.topic?.toLowerCase();
    const cardLevel = card.dataset.level?.toLowerCase();
    const cardText = card.textContent.toLowerCase();

    const matchesSearch = searchTerm === "" || cardText.includes(searchTerm);
    let showCard = false;

    // Case 1: No filters selected → Show all cards (if they match search)
    if (selectedTopics.length === 0 && selectedLevels.length === 0) {
      showCard = true;
    }
    // Case 2: Both topic & level filters selected → Must match BOTH
    else if (selectedTopics.length > 0 && selectedLevels.length > 0) {
      showCard = selectedTopics.includes(cardTopic) && selectedLevels.includes(cardLevel);
    }
    // Case 3: Only topics selected → Must match at least one topic
    else if (selectedTopics.length > 0) {
      showCard = selectedTopics.includes(cardTopic);
    }
    // Case 4: Only levels selected → Must match at least one level
    else if (selectedLevels.length > 0) {
      showCard = selectedLevels.includes(cardLevel);
    }

    card.style.display = (showCard && matchesSearch) ? "block" : "none";
  });
}