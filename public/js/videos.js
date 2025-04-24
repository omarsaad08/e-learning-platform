let player;
let currentIndex = 0;
let progressInterval;

const videoItems = [...document.querySelectorAll('.playlist-item')];
const progressBar = document.getElementById('progressBar');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const markCompleteBtn = document.getElementById('mark-complete-btn');

const savedProgress = JSON.parse(localStorage.getItem('videoProgress')) || {};

const videos = videoItems.map((item, index) => ({
  id: index,
  url: item.getAttribute('data-video'),
  completed: savedProgress[index] || false
}));

// دالة تحميل فيديو حسب الفهرس
function loadVideo(index) {
  if (index < 0 || index >= videos.length) return;

  currentIndex = index;
  const videoId = extractVideoId(videos[index].url);
  if (player) {
    player.loadVideoById(videoId);
  }

  updateUI();
}

// دالة استخراج ID الفيديو من الرابط
function extractVideoId(url) {
  const regExp = /^.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
  const match = url.match(regExp);
  return match && match[1].length === 11 ? match[1] : null;
}

// دالة التحديث الكامل للواجهة
function updateUI() {
  updatePlaylistUI();
  updateMarkCompleteButton();
  updateProgressBar();
}

function updatePlaylistUI() {
  videoItems.forEach((item, index) => {
    item.classList.toggle('playlist-active', index === currentIndex);
    item.classList.toggle('completed', videos[index].completed);
  });
}

function updateMarkCompleteButton() {
  const isCompleted = videos[currentIndex].completed;
  markCompleteBtn.innerHTML = isCompleted ? '<span>Completed ✓</span>' : '<span>Mark As Complete</span>';
  markCompleteBtn.style.backgroundColor = isCompleted ? '#28a745' : '#4f5ee6';
}

function updateProgressBar() {
  if (videos[currentIndex].completed) {
    progressBar.style.width = "100%";
    progressBar.classList.add('completed');
    clearInterval(progressInterval);
  } else {
    progressBar.classList.remove('completed');
    resetProgressBar();
  }
}

function resetProgressBar() {
  progressBar.style.width = "0%";
  clearInterval(progressInterval);
}

// حفظ التقدم في localStorage
function saveProgress() {
  const progress = {};
  videos.forEach(video => {
    progress[video.id] = video.completed;
  });
  localStorage.setItem('videoProgress', JSON.stringify(progress));
}

// يتم استدعاء هذه تلقائيًا عند تحميل YouTube API
function onYouTubeIframeAPIReady() {
  player = new YT.Player('mainVideo', {
    height: '100%',
    width: '100%',
    videoId: extractVideoId(videos[currentIndex].url),
    playerVars: {
      'autoplay': 0,
      'controls': 1,
      'rel': 0,
      'modestbranding': 1
    },
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

function onPlayerReady() {
  loadVideo(currentIndex);
}

function onPlayerStateChange(event) {
  if (event.data === YT.PlayerState.PLAYING) {
    startProgressTimer();
  } else {
    clearInterval(progressInterval);
  }
}

function startProgressTimer() {
  clearInterval(progressInterval);
  if (!videos[currentIndex].completed) {
    progressInterval = setInterval(updateVideoProgress, 1000);
  }
}

function updateVideoProgress() {
  if (player && player.getDuration) {
    const duration = player.getDuration();
    const currentTime = player.getCurrentTime();
    const progressPercent = (currentTime / duration) * 100;
    progressBar.style.width = `${progressPercent}%`;
  }
}

// أزرار التنقل
nextBtn.addEventListener('click', () => {
  if (currentIndex < videos.length - 1) {
    loadVideo(currentIndex + 1);
  }
});

prevBtn.addEventListener('click', () => {
  if (currentIndex > 0) {
    loadVideo(currentIndex - 1);
  }
});

markCompleteBtn.addEventListener('click', () => {
  videos[currentIndex].completed = !videos[currentIndex].completed;
  saveProgress();
  updateUI();
});

// قائمة التشغيل
videoItems.forEach((item, index) => {
  item.addEventListener('click', () => loadVideo(index));
});
