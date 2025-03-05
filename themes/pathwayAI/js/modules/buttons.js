export function buttonHovers() {
    const mainNavLinks = gsap.utils.toArray('.btn');
    mainNavLinks.forEach(link => {
        link.addEventListener('mouseleave', e => {
            link.classList.add('btn-hover-off');
        });
        link.addEventListener('transitionend', e => {
            if (e.propertyName === 'transform') {
                //remove class
                link.classList.remove('btn-hover-off');
            }
        });
    });
}