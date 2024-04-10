let customInputs = document.querySelectorAll('.form-control');

if (customInputs) {
    customInputs.forEach((el) => {
        inputHandler(el)
        el.addEventListener('input', (e) => {
            inputHandler(el)
        })
    })
}

function inputHandler(el) {
    let parent = el.closest('.form-group')
    if (parent) {
        let label = parent.querySelector('.input-label');
        if (el.value !== '') {
            label.classList.add('typing');
        } else {
            label.classList.remove('typing');
        }
    }
}
