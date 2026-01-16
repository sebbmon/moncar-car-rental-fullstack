window.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelector('.navbar-menu');
    const toggler = document.querySelector('.navbar-toggle');
    console.log(menu, toggler);
    if (toggler && menu) {
        toggler.addEventListener('click', () => {
            menu.classList.toggle('active');
        })
    }

    const slides = document.querySelectorAll('.opinions-opinion');
    let index = 0;

    const arrowLeft = document.querySelector('.opinion-arrow-left');
    const arrowRight = document.querySelector('.opinion-arrow-right');

    if(arrowLeft) {
        arrowLeft.addEventListener('click', () => {
            slides[index].classList.remove('active');
            index -= 1; 
            if (index < 0) index = slides.length - 1;
            slides[index].classList.add('active');
        });
    }

    if (arrowRight){
        arrowRight.addEventListener('click', () => {
            slides[index].classList.remove('active');
            index += 1; 
            if (index > slides.length -1) index = 0;
            slides[index].classList.add('active');
        });
    }
});