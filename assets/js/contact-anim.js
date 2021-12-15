const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('anim-up');
        }
    });
});

observer.observe(document.querySelector('#contactEmail'));
for (let i = 1; i <= 4; i++) {
    if (document.querySelector(`#contactSocial--${i}`) !== null) {
        observer.observe(document.querySelector(`#contactSocial--${i}`));
    }
}