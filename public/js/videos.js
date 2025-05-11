const playlistItems = document.querySelectorAll('.playlist-item');
const iframe = document.getElementById('mainVideo');
const markBtn = document.getElementById('mark-complete-btn');
const nextBtn = document.getElementById('next-btn');
const prevBtn = document.getElementById('prev-btn');

let currentIndex = 0;
const completedLessons = new Set(JSON.parse(localStorage.getItem('completedLessons') || '[]'));

// تحميل آخر درس تم عرضه
const savedIndex = localStorage.getItem('currentLessonIndex');
if (savedIndex !== null) {
  currentIndex = parseInt(savedIndex);
  loadVideo(currentIndex);
} else {
  loadVideo(0); // أول فيديو افتراضي
}

// تحميل الفيديو وتحديث الشكل
function loadVideo(index) {
  const selected = playlistItems[index];
  if (!selected) return;

  const url = selected.getAttribute('data-video');
  iframe.src = url;

  playlistItems.forEach(i => i.classList.remove('playlist-active'));
  selected.classList.add('playlist-active');

  currentIndex = index;
  localStorage.setItem('currentLessonIndex', currentIndex);

  updateMarkButton();
  highlightCompletedLessons();
}

// تحديث شكل زر "تم إنهاؤه"
function updateMarkButton() {
  const currentId = currentIndex;
  if (completedLessons.has(currentId)) {
    markBtn.innerText = '✓ مكتمل';
    markBtn.classList.add('btn-success');
  } else {
    markBtn.innerText = 'Mark As Complete';
    markBtn.classList.remove('btn-success');
  }
}

// تمييز العناصر المكتملة في القائمة
function highlightCompletedLessons() {
  playlistItems.forEach((item, index) => {
    item.classList.remove('completed');
    if (completedLessons.has(index)) {
      item.classList.add('completed');
    }
  });
}

// التعامل مع الضغط على عنصر من القائمة
playlistItems.forEach((item, index) => {
  item.addEventListener('click', () => {
    loadVideo(index);
  });
});

// زر التالي
nextBtn.addEventListener('click', () => {
  if (currentIndex < playlistItems.length - 1) {
    loadVideo(currentIndex + 1);
  }
});

// زر السابق
prevBtn.addEventListener('click', () => {
  if (currentIndex > 0) {
    loadVideo(currentIndex - 1);
  }
});

// زر "تم إنهاؤه"
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

function toggleSidebar() {
  const sidebar = document.querySelector('.sidebar');
  sidebar.classList.toggle('hidden');
}

// أول تفعيل
highlightCompletedLessons();
