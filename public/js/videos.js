let player;
const videoItems = [...document.querySelectorAll('.playlist-item')];
const mainVideo = document.getElementById('mainVideo');
const videoTitle = document.getElementById('videoTitle');
const progressBar = document.getElementById('progressBar');
const timeDisplay = document.getElementById('timeLeft');
const markCompleteCheckbox = document.getElementById('markComplete');
const completedVideos = new Set();
const totalVideos = videoItems.length;

function getActiveIndex() {
  return videoItems.findIndex(item => item.classList.contains('playlist-active'));
}

function getActiveItem() {
  return videoItems.find(item => item.classList.contains('playlist-active'));
}

function loadVideo(index) {
  if (index < 0 || index >= totalVideos) return;

  videoItems.forEach(item => item.classList.remove('playlist-active'));
  const item = videoItems[index];
  item.classList.add('playlist-active');

  const videoURL = item.getAttribute('data-video') + '?enablejsapi=1';
  player.loadVideoByUrl(videoURL);

  videoTitle.textContent = item.textContent;
  markCompleteCheckbox.checked = completedVideos.has(item.dataset.video);
}

function updateProgress() {
  const percent = Math.floor((completedVideos.size / totalVideos) * 100);
  progressBar.style.width = `${percent}%`;
  progressBar.textContent = `${percent}%`;
}

function updateTimeLeft() {
  const update = () => {
    const duration = player.getDuration();
    const current = player.getCurrentTime();
    const timeLeft = Math.max(0, duration - current);
    const mins = Math.floor(timeLeft / 60);
    const secs = Math.floor(timeLeft % 60).toString().padStart(2, '0');
    timeDisplay.textContent = `Time left: ${mins}:${secs}`;
    if (player.getPlayerState() === YT.PlayerState.PLAYING) {
      requestAnimationFrame(update);
    }
  };
  requestAnimationFrame(update);
}

function onPlayerStateChange(event) {
  if (event.data === YT.PlayerState.PLAYING) {
    updateTimeLeft();
  } else if (event.data === YT.PlayerState.ENDED) {
    const current = getActiveItem();
    if (current) {
      completedVideos.add(current.dataset.video);
      updateProgress();
      markCompleteCheckbox.checked = true;
    }
  }
}

function onYouTubeIframeAPIReady() {
  player = new YT.Player('mainVideo', {
    events: {
      'onStateChange': onPlayerStateChange
    }
  });
}

// Event Listeners
document.getElementById('prevBtn').addEventListener('click', () => {
  const currentIndex = getActiveIndex();
  loadVideo(currentIndex - 1);
});

document.getElementById('nextBtn').addEventListener('click', () => {
  const currentIndex = getActiveIndex();
  loadVideo(currentIndex + 1);
});

document.getElementById('startLearningBtn').addEventListener('click', () => {
  const index = getActiveIndex() !== -1 ? getActiveIndex() : 0;
  loadVideo(index);
  player.playVideo();
});

markCompleteCheckbox.addEventListener('change', (e) => {
  const current = getActiveItem();
  if (!current) return;
  const vid = current.dataset.video;
  if (e.target.checked) {
    completedVideos.add(vid);
  } else {
    completedVideos.delete(vid);
  }
  updateProgress();
});

videoItems.forEach((item, index) => {
  item.addEventListener('click', () => {
    loadVideo(index);
  });
});

// Make YouTube API global callback work
window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
