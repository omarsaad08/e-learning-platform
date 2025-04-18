let player;
const videoItems = [...document.querySelectorAll('.playlist-item')];
const mainVideo = document.getElementById('mainVideo');
const progressBar = document.getElementById('progressBar');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const markCompleteBtn = document.getElementById('mark-complete-btn');

// تحميل الحالة المحفوظة أو تهيئة جديدة
const savedProgress = JSON.parse(localStorage.getItem('videoProgress')) || {};
const videos = videoItems.map((item, index) => ({
  id: index,
  url: item.getAttribute('data-video'),
  completed: savedProgress[index] || false
}));

let currentIndex = 0;
let progressInterval;

// دالة تحميل الفيديو
function loadVideo(index) {
  if (index < 0 || index >= videos.length) return;
  
  currentIndex = index;
  const videoId = extractVideoId(videos[index].url);
  
  if (player) {
    player.loadVideoById(videoId);
  } else {
    mainVideo.src = `${videos[index].url}?enablejsapi=1&rel=0`;
  }
  
  updateUI();
}

// دالة تحديث واجهة المستخدم بالكامل
function updateUI() {
  updateActivePlaylistItem();
  updateMarkCompleteButton();
  updateProgressBar();
}

// دالة استخراج ID الفيديو
function extractVideoId(url) {
  const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
  const match = url.match(regExp);
  return (match && match[2].length === 11) ? match[2] : null;
}

// دالة تحديث العنصر النشط في القائمة
function updateActivePlaylistItem() {
  videoItems.forEach((item, index) => {
    item.classList.toggle('playlist-active', index === currentIndex);
    item.classList.toggle('completed', videos[index].completed);
  });
}

// دالة تحديث زر الإكمال
function updateMarkCompleteButton() {
  const isCompleted = videos[currentIndex].completed;
  markCompleteBtn.innerHTML = isCompleted ? '<span>Completed ✓</span>' : '<span>Mark As Complete</span>';
  markCompleteBtn.style.backgroundColor = isCompleted ? '#28a745' : '#4f5ee6';
}

// دالة تحديث شريط التقدم
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

// نظام حفظ الحالة في localStorage
function saveProgress() {
  const progress = {};
  videos.forEach(video => {
    progress[video.id] = video.completed;
  });
  localStorage.setItem('videoProgress', JSON.stringify(progress));
}

// تهيئة مشغل YouTube
function onYouTubeIframeAPIReady() {
  player = new YT.Player('mainVideo', {
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

function onPlayerReady(event) {
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

// أحداث الأزرار
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

// أحداث عناصر القائمة
videoItems.forEach((item, index) => {
  item.addEventListener('click', () => loadVideo(index));
});

// التحميل الأولي
function initialize() {
  // تطبيق الحالة المحفوظة على الواجهة
  videos.forEach((video, index) => {
    if (video.completed) {
      videoItems[index].classList.add('completed');
    }
  });

  // تحميل مشغل YouTube
  if (typeof YT !== 'undefined' && YT.loaded) {
    onYouTubeIframeAPIReady();
  } else {
    const tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    const firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
  }
}

initialize();