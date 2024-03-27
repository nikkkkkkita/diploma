input = document.querySelectorAll('.number-validate');

input.forEach((item) => {
    item.addEventListener("keyup", function () {
        this.value = this.value.replace(/[^\d]/g, "");
    })
});
