if (typeof footerGetInObserver === 'undefined') {
    const footerGetInObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const getin = entry.target.querySelector('#getin');
    
            if (entry.isIntersecting) {
                getin.classList.add('getin-is-animated');
                return;
            }
    
            getin.classList.remove('getin-is-animated');
        });
    });
    
    footerGetInObserver.observe(document.querySelector('#getinWrapper'));
} else {
    footerGetInObserver.observe(document.querySelector('#getinWrapper'));
}

if (typeof footerTouchObserver === 'undefined') {
    const footerTouchObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const touch = entry.target.querySelector('#touch');
    
            if (entry.isIntersecting) {
                touch.classList.add('touch-is-animated');
                return;
            }
    
            touch.classList.remove('touch-is-animated');
        });
    });
    
    footerTouchObserver.observe(document.querySelector('#touchWrapper'));
} else {
    footerTouchObserver.observe(document.querySelector('#touchWrapper'));
}

if (typeof footerWithMeObserver === 'undefined') {
    const footerWithMeObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const withme = entry.target.querySelector('#withme');
    
            if (entry.isIntersecting) {
                withme.classList.add('withme-is-animated');
                return;
            }
    
            withme.classList.remove('withme-is-animated');
        });
    });
    
    footerWithMeObserver.observe(document.querySelector('#withmeWrapper'));
} else {
    footerWithMeObserver.observe(document.querySelector('#withmeWrapper'));
}