let mySwiper = new Swiper('.slider-block', {
    slidesPerView: 1,
})
const sliderNavItems = document.querySelectorAll('.slider-nav__item');

sliderNavItems.forEach((el, index) => {
    el.setAttribute('data-index', index);

    el.addEventListener('click', (e) => {
        const index = parseInt(e.currentTarget.dataset.index);

        mySwiper.slideTo(index);
    });
});

const sliderNav = document.querySelector('.slider-nav');

let mySwiperNav = new Swiper(sliderNav, {
    slidesPerView: 5,
    // spaceBetween: 5,
    freeMode: true,
    direction: 'vertical',
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
