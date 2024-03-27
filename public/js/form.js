let radios = document.querySelectorAll('.radio-cat');
let forms = document.querySelectorAll('.someclass');
radios.forEach((radio) => {
    if (radio.checked) {
        let formId = radio.dataset.form;
        toggleForm(formId);
    }
    radio.addEventListener('change', function (evt) {
        let formId = radio.dataset.form;
        toggleForm(formId);
    })
})
function toggleForm(formId) {
    forms.forEach((form) => {
        form.classList.add('hide');
        // Отключаем все поля ввода в форме
        let inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach((input) => {
            input.disabled = true;
        });
    })
    let form = document.getElementById(formId);
    form.classList.remove('hide');
    // Включаем все поля ввода в выбранной форме
    let inputs = form.querySelectorAll('input, textarea, select');
    inputs.forEach((input) => {
        input.disabled = false;
    });
}
