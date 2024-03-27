const buttons = document.querySelectorAll('.media-button');
const inputId = document.getElementById('media-input-id');

buttons.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        inputId.value = btn.dataset.id;
    });
})
