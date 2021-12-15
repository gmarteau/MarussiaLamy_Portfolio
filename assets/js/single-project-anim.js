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
for (let i = 1; i <= 10; i++) {
    if (document.querySelector(`#projectImage--${i}`) !== null) {
        observer.observe(document.querySelector(`#projectImage--${i}`));
    }
}