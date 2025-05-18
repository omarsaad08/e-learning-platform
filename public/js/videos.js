const playlistItems = document.querySelectorAll('.playlist-item');
const videoElement = document.getElementById('mainVideo');
const nextBtn = document.getElementById('next-btn');
const prevBtn = document.getElementById('prev-btn');
const markBtn = document.getElementById('mark-complete-btn');

let currentIndex = 0;
const completedLessons = new Set(JSON.parse(localStorage.getItem('completedLessons') || '[]'));

const savedIndex = localStorage.getItem('currentLessonIndex');
if (savedIndex !== null) {
  currentIndex = parseInt(savedIndex);
  loadVideo(currentIndex);
} else {
  loadVideo(0);
}

function loadVideo(index) {
  const selected = playlistItems[index];
  if (!selected) return;

  const url = selected.getAttribute('data-video');
  videoElement.src = url;

  playlistItems.forEach(i => i.classList.remove('playlist-active'));
  selected.classList.add('playlist-active');

  currentIndex = index;
  localStorage.setItem('currentLessonIndex', currentIndex);
  updateMarkButton();
  highlightCompletedLessons();
}

function updateMarkButton() {
  if (completedLessons.has(currentIndex)) {
    markBtn.innerText = 'Completed';
    markBtn.classList.add('btn-success');
  } else {
    markBtn.innerText = 'Mark Completed';
    markBtn.classList.remove('btn-success');
  }
}

function highlightCompletedLessons() {
  playlistItems.forEach((item, index) => {
    item.classList.toggle('completed', completedLessons.has(index));
  });
}

playlistItems.forEach((item, index) => {
  item.addEventListener('click', () => loadVideo(index));
});

nextBtn.addEventListener('click', () => {
  if (currentIndex < playlistItems.length - 1) {
    loadVideo(currentIndex + 1);
  }
});

prevBtn.addEventListener('click', () => {
  if (currentIndex > 0) {
    loadVideo(currentIndex - 1);
  }
});

markBtn.addEventListener('click', () => {
  if (completedLessons.has(currentIndex)) {
    completedLessons.delete(currentIndex);
  } else {
    completedLessons.add(currentIndex);
  }
  localStorage.setItem('completedLessons', JSON.stringify([...completedLessons]));
  updateMarkButton();
  highlightCompletedLessons();
});
