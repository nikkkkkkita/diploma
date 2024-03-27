let coverImg = document.querySelector('.shop-cover__img');
let avatarImg = document.querySelector('.shop-avatar');
const avatarInput = document.getElementById('avatar');
const headerInput = document.getElementById('header');

//Добавляем обработчик события изменения для input с выбором файла аватара
avatarInput.addEventListener('change', function() {
    // Вызываем функцию download с параметрами
    download(avatarInput, avatarImg, 'src');
});

headerInput.addEventListener('change', function() {
    download(headerInput, coverImg, 'bg');
});

// Функция для загрузки изображения и его применения к элементу
function download(input, block, style) {
    let file = input.files[0]; //Получаем выбранный файл из input
    if (!file) return; //Если файл не выбран, прерываем выполнение кода
    const reader = new FileReader(); //
    reader.readAsDataURL(file);
    reader.onload = function () {
        if (style === 'bg') {

            block.style.backgroundImage = `url(${reader.result})`;

        } else if (style === 'src') {

            block.src = reader.result;
        } else {
            console.log('Ошибка при загрузке фотки')
        }
    };

    // let coverReader = new FileReader();
    // coverReader.readAsDataURL(file);
    //
    // let avatarReader = new FileReader();
    // avatarReader.readAsDataURL(file);
    //
    // coverReader.onload = function () {
    //     coverImg.style.backgroundImage = `url(${coverReader.result})`;
    // };
    //
    // avatarReader.onload = function () {
    //     avatarImg.src = avatarReader.result;
    // };
}
