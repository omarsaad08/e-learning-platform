// Playlist Logic
const playlistItems = document.querySelectorAll('.playlist-item');
const mainVideo = document.getElementById('mainVideo');
const videoTitle = document.getElementById('videoTitle');

playlistItems.forEach(item => {
  item.addEventListener('click', () => {
    document.querySelector('.playlist-active')?.classList.remove('playlist-active');
    item.classList.add('playlist-active');

    const videoURL = item.getAttribute('data-video');
    mainVideo.src = videoURL;
    videoTitle.textContent = item.textContent;
  });
});

// Dark Mode Toggle
const toggle = document.getElementById('darkModeToggle');
toggle.addEventListener('change', () => {
  document.documentElement.setAttribute('data-theme', toggle.checked ? 'dark' : 'light');
});
