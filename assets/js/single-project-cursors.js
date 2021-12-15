$(document).ready(function() {
    $('.prev-project-cursor__elt').lettering();
    $('.next-project-cursor__elt').lettering();

    const mouseX = (event) => {
        return event.clientX;
    };
    const mouseY = (event) => {
        return event.clientY;
    };

    const cursorPosition = (event) => {
        const mouse = {
            x: mouseX(event),
            y: mouseY(event)
        };
        $('#prevProjectCursor').css({
            'top': mouse.y + 'px',
            'left': mouse.x + 'px'
        });
    };

    // let timer = false;
    // $('#otherProject--1').hover(function(event) {
    //     const _event = event;
    //     timer = setTimeout(cursorPosition(_event), 1);
    //     // window.setTimeout(cursorPosition(_event), 1);
    //     // cursorPosition(event);
    // });
    // otherProjects.onmousemove = init = (event) => {
    //     const _event = event;
    //     timer = setTimeout(cursorPosition(_event), 1);
    // };
});