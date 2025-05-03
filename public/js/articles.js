
  document.querySelector('.search-box').addEventListener('input', function () {
    const searchText = this.value.toLowerCase();
    const articles = document.querySelectorAll('.card');

    articles.forEach(card => {
      const title = card.getAttribute('data-title') || '';
      if (title.includes(searchText)) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });