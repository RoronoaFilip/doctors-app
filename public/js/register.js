const userTypeSelect = document.getElementById('userType');
const firstName = document.getElementById('name');
const lastName = document.getElementById('surname');

userTypeSelect.addEventListener('change', function () {
    if (userTypeSelect.value === 'DOCTOR') {
        firstName.parentElement.classList.remove('hidden');
        lastName.parentElement.classList.remove('hidden');
    } else {
        firstName.parentElement.classList.add('hidden');
        lastName.parentElement.classList.add('hidden');
    }
});

firstName.parentElement.classList.add('hidden');
lastName.parentElement.classList.add('hidden');
