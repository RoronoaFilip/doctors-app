const profileEditButton = document.getElementById('profileEditButton');

profileEditButton?.addEventListener('click', () => {
    window.location.href = '/byte/profile.php?edit';
});
