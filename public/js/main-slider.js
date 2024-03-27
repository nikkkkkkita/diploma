let slider = document.querySelector('.swiper-container');

let mySwiper = new Swiper(slider, {
    slidesPerView: 1,
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
    }
});
