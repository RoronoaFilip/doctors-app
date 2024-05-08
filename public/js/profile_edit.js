const specialty = document.getElementById('specialty');
const education = document.getElementById('education');

const hiddenFields = [
    specialty.parentElement,
    education.parentElement
];

hiddenFields.forEach(field => field.classList.remove('hidden'));

