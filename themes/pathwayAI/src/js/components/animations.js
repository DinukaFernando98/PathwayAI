import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

function gsapAnim(elements, toggleClass) {
    if (elements) {

        gsap.registerPlugin(ScrollTrigger);

        elements.forEach( (item) => {
            gsap.from(item, {
                scrollTrigger: {
                    start: 'top bottom',
                    end: 'bottom top',
                    trigger: item,
                    scrub: true,
                    //markers: true,
                    toggleClass: toggleClass,
                    once: true
                }
            });
        })
    }
}

function gsapStaggerBlocksAnim(element) {
    if (element) {

        gsap.registerPlugin(ScrollTrigger);

        ScrollTrigger.batch(element, {
            onEnter: elements => {
                gsap.from(elements, {
                    autoAlpha: 0,
                    y: 50,
                    stagger: 0.15
                });
            },
            once: true
        });
    }
}

window.addEventListener('load', () => {
    const slideInLefts = gsap.utils.toArray('.slideInLeft');
    const slideInRights = gsap.utils.toArray('.slideInRight');
    const slideInBottoms = gsap.utils.toArray('.slideInBottom');

    gsapAnim(slideInLefts, 'slide-in-left');
    gsapAnim(slideInRights, 'slide-in-right');
    gsapAnim(slideInBottoms, 'slide-in-bottom');
    gsapStaggerBlocksAnim('.slideInBottomStagger');
})