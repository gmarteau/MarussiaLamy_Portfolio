if (typeof observer === 'undefined') {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('anim-up');
            }
        });
    });
    
    observer.observe(document.querySelector('#aboutTitle'));
    observer.observe(document.querySelector('#aboutName'));
    observer.observe(document.querySelector('#aboutTagline'));
    observer.observe(document.querySelector('#aboutDescriptionTitle'));
    observer.observe(document.querySelector('#aboutDescription'));
    observer.observe(document.querySelector('#aboutServicesTitle'));
    for (let i = 1; i <= 5; i++) {
        if (document.querySelector(`#aboutService--${i}`) !== null) {
            observer.observe(document.querySelector(`#aboutService--${i}`));
        }
    }
    observer.observe(document.querySelector('#aboutExpTitle'));
    observer.observe(document.querySelector('#aboutExpList'));
    observer.observe(document.querySelector('#aboutSchoolTitle'));
    observer.observe(document.querySelector('#aboutSchoolList'));
} else {
    observer.observe(document.querySelector('#aboutTitle'));
    observer.observe(document.querySelector('#aboutName'));
    observer.observe(document.querySelector('#aboutTagline'));
    observer.observe(document.querySelector('#aboutDescriptionTitle'));
    observer.observe(document.querySelector('#aboutDescription'));
    observer.observe(document.querySelector('#aboutServicesTitle'));
    for (let i = 1; i <= 5; i++) {
        if (document.querySelector(`#aboutService--${i}`) !== null) {
            observer.observe(document.querySelector(`#aboutService--${i}`));
        }
    }
    observer.observe(document.querySelector('#aboutExpTitle'));
    observer.observe(document.querySelector('#aboutExpList'));
    observer.observe(document.querySelector('#aboutSchoolTitle'));
    observer.observe(document.querySelector('#aboutSchoolList'));
}