const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('anim-up');
        }
    });
});

observer.observe(document.querySelector('#archiveHero'));
for (let i = 1; i <= 15; i++) {
    if (document.querySelector(`#archiveProject--${i}`) !== null) {
        observer.observe(document.querySelector(`#archiveProject--${i}`));
    }
}