const userTypeSelect = document.getElementById('userType');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const specialty = document.getElementById('specialty');
const education = document.getElementById('education');

const hiddenFields = [
    firstName.parentElement,
    lastName.parentElement,
    specialty.parentElement,
    education.parentElement
];

function hide() {
    hiddenFields.forEach(field => field.classList.add('hidden'));
}

function show() {
    hiddenFields.forEach(field => field.classList.remove('hidden'));
}

userTypeSelect.addEventListener('change', function () {
    if (userTypeSelect.value === 'DOCTOR') {
        show();
    } else {
        hide();
    }
});

switch (userTypeSelect.value) {
    case 'DOCTOR':
        show();
        break;
    case 'USER':
        hide();
        break;
}
