let imagesWrapper = document.querySelector('.images-wrap');
let imgInput = document.getElementById('image');

imgInput.addEventListener('change', function () {
    // Перебираем каждый выбранный файл
    Array.from(imgInput.files).forEach(file => {
        let reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = function () {
            // Создаем элементы div и img для каждого файла
            let imgWrap = document.createElement('div');
            let imgWrapImg = document.createElement('div');
            let btnWrap = document.createElement('div');
            let btn = document.createElement('button');
            let img = document.createElement('img');

            // Присваиваем им классы
            imgWrap.className = 'img-wrap';
            imgWrapImg.className = 'img-wrap__img';
            btnWrap.className = 'img-wrap__btn';
            btn.className = 'btn-delete';

            // Присваиваем атрибут src для изображения
            img.src = reader.result;

            // Добавляем изображение внутрь элемента imgWrapImg
            imgWrapImg.appendChild(img);

            // Добавляем элемент imgWrapImg внутрь элемента imgWrap
            imgWrap.appendChild(imgWrapImg);
            imgWrap.appendChild(btnWrap);
            btnWrap.appendChild(btn);

            // Добавляем элемент imgWrap внутрь элемента imgWrapper
            imagesWrapper.appendChild(imgWrap);

            btn.addEventListener('click', function () {
                imgWrap.remove();
                imgInput.value = '';
            });
        }
    });
});
