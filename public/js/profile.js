// Get DOM elements
const profileImage = document.getElementById('profileImage');
const imageUpload = document.getElementById('imageUpload');
const userName = document.getElementById('userName');
const editNameBtn = document.getElementById('editNameBtn');
const userTitle = document.getElementById('userTitle');
const userEmail = document.getElementById('userEmail');
const coursesCompleted = document.getElementById('coursesCompleted');
const logoutBtn = document.getElementById('logoutBtn');
const changePasswordBtn = document.getElementById('changePasswordBtn');
const savePasswordBtn = document.getElementById('savePasswordBtn');
const saveUsernameBtn = document.getElementById('saveUsernameBtn');
const newUsernameInput = document.getElementById('newUsername');

// Mock user data (in a real app, this would come from a backend)
const userData = {
    name: 'Jane Smith',
    title: 'Web Development Student',
    email: 'jane.smith@example.com',
    coursesCompleted: 12
};

// Load user data
function loadUserData() {
    userName.textContent = userData.name;
    userTitle.textContent = userData.title;
    userEmail.textContent = userData.email;
    coursesCompleted.textContent = userData.coursesCompleted;
}

// Handle profile image change
imageUpload.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            profileImage.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Handle username change
editNameBtn.addEventListener('click', () => {
    const changeUsernameModal = new bootstrap.Modal(document.getElementById('changeUsernameModal'));
    document.getElementById('newUsername').value = userData.name;
    changeUsernameModal.show();
});

saveUsernameBtn.addEventListener('click', () => {
    const newUsername = document.getElementById('newUsername').value;
    if (newUsername.trim()) {
        userData.name = newUsername;
        userName.textContent = newUsername;
        bootstrap.Modal.getInstance(document.getElementById('changeUsernameModal')).hide();
    }
});

// Handle password change
changePasswordBtn.addEventListener('click', () => {
    const changePasswordModal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
    changePasswordModal.show();
});

savePasswordBtn.addEventListener('click', () => {
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (!currentPassword || !newPassword || !confirmPassword) {
        alert('Please fill in all password fields');
        return;
    }

    if (newPassword !== confirmPassword) {
        alert('New passwords do not match');
        return;
    }

    // In a real app, you would send this to a backend
    alert('Password changed successfully');
    bootstrap.Modal.getInstance(document.getElementById('changePasswordModal')).hide();
});

// Logout function
logoutBtn.addEventListener('click', function() {
    if (confirm('Are you sure you want to logout?')) {
        // In a real app, you would clear session/local storage and redirect
        alert('Logged out successfully!');
        // window.location.href = 'login.html';
    }
});

// Initialize page
document.addEventListener('DOMContentLoaded', loadUserData);
