const swup = new Swup({
    cache: false,
    plugins: [new SwupScriptsPlugin({
        head: true,
        body: true
    })],
    linkSelector:
      'a[href^="' +
      window.location.origin +
      '"]:not([data-no-swup]), a[href^="/"]:not([data-no-swup]), a[href^="#"]:not([data-no-swup])'
});

const replaceBanner = () => {
    const topPosition = window.scrollY + 'px';
    const height = window.innerHeight + 'px';
    const bannerTransition = document.querySelector('.banner-transition');
    bannerTransition.style.top = topPosition;
    bannerTransition.style.height = height;
};

const goToTop = () => {
    window.scroll({
        top: 0,
        left: 0,
        behavior: 'instant'
    });
};

swup.on('animationOutStart', replaceBanner);
swup.on('animationOutDone', goToTop);