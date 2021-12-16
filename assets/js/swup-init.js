const swup = new Swup({
    cache: false,
    plugins: [new SwupScriptsPlugin({
        head: false,
        body: true
    })]
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

const loadScripts = () => {
    console.log(document.getElementsByTagName('script'));
};

swup.on('animationOutStart', replaceBanner);
swup.on('animationOutDone', goToTop);
swup.on('animationInDone', loadScripts);