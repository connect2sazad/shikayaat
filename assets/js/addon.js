window.addEventListener('load', function () {
    var loaderOverlay = document.querySelector('.loader-overlay');

    loaderOverlay.style.animation = 'fadeOut 2s ease-in-out forwards';

    setTimeout(function () {
        loaderOverlay.style.display = 'none';
    }, 1000);
});