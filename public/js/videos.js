// const videoItems = document.querySelectorAll('.playlist-item');
// const videoPlayer = document.getElementById('mainVideo');
// const videoTitle = document.getElementById('videoTitle');

// videoItems.forEach(item => {
//   item.addEventListener('click', () => {
//     // Switch video source
//     const url = item.getAttribute('data-url');
//     const title = item.getAttribute('data-title');

//     videoPlayer.querySelector('source').src = url;
//     videoPlayer.load(); // Reload the new video
//     videoTitle.textContent = title;

//     // Highlight selected video
//     videoItems.forEach(i => i.classList.remove('playlist-active'));
//     item.classList.add('playlist-active');
//   });
// });
