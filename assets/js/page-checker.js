if (typeof main === 'undefined') {
    const main = document.querySelector('main');
    const body = document.querySelector('body');
    const classes = ['single-project', 'contact', 'about', 'archive'];
    
    classes.forEach(classe => {
        if (body.classList.contains(classe)) {
            body.classList.remove(classe);
        }  
    });
    
    if (main.classList.contains('archive')) {
        body.classList.add('archive');
    }
    
    if (main.classList.contains('single-project')) {
        body.classList.add('single-project');
    }
    
    if (main.classList.contains('contact')) {
        body.classList.add('contact');
    }
    
    if (main.classList.contains('about')) {
        body.classList.add('about');
    }
} else {
    classes.forEach(classe => {
        if (body.classList.contains(classe)) {
            body.classList.remove(classe);
        }  
    });
    
    if (main.classList.contains('archive')) {
        body.classList.add('archive');
    }
    
    if (main.classList.contains('single-project')) {
        body.classList.add('single-project');
    }
    
    if (main.classList.contains('contact')) {
        body.classList.add('contact');
    }
    
    if (main.classList.contains('about')) {
        body.classList.add('about');
    }
}