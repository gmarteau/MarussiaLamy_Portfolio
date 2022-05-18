if (typeof observer === 'undefined') {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('anim-up');
            }
        });
    });
    
    observer.observe(document.querySelector('#projectHero'));
    observer.observe(document.querySelector('#projectInfo'));
    observer.observe(document.querySelector('#projectDescription'));
    observer.observe(document.querySelector('#projectDetails'));
    observer.observe(document.querySelector('#projectVimeo'));
    observer.observe(document.querySelector('#projectYoutube'));
    observer.observe(document.querySelector('#projectSquares'));
    for (let i = 1; i <= 10; i++) {
        if (document.querySelector(`#projectImage--${i}`) !== null) {
            observer.observe(document.querySelector(`#projectImage--${i}`));
        }
    }
} else {
    observer.observe(document.querySelector('#projectHero'));
    observer.observe(document.querySelector('#projectInfo'));
    observer.observe(document.querySelector('#projectDescription'));
    observer.observe(document.querySelector('#projectDetails'));
    observer.observe(document.querySelector('#projectVimeo'));
    observer.observe(document.querySelector('#projectYoutube'));
    observer.observe(document.querySelector('#projectSquares'));
    for (let i = 1; i <= 10; i++) {
        if (document.querySelector(`#projectImage--${i}`) !== null) {
            observer.observe(document.querySelector(`#projectImage--${i}`));
        }
    }
}

document.querySelector('#toggleNav').onclick = (e) => {
    e.preventDefault();
    const singleProjectNav = document.querySelector('.single-project-nav');
    const navToggler = document.querySelector('#toggleNav');
    if (navToggler.classList.contains('toggled')) {
        navToggler.classList.remove('toggled');
        singleProjectNav.classList.remove('show');
    } else {
        navToggler.classList.add('toggled');
        singleProjectNav.classList.add('show');
    }
}