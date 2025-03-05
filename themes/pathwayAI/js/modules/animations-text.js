export function animationsText() {
    // Split text into spans
    let typeSplit = new SplitType("[text-split-2]", {
        types: "words, chars",
        tagName: "span"
    });
    

    // Link timelines to scroll position
    function createScrollTrigger(triggerElement, timeline) {
        // Reset tl when scroll out of view past bottom of screen
        ScrollTrigger.create({
            trigger: triggerElement,
            start: "top bottom",
            onLeaveBack: () => {
                timeline.progress(0);
                timeline.pause();
            }
        });
        // Play tl when scrolled into view (60% from top of screen)
        ScrollTrigger.create({
            trigger: triggerElement,
            start: "top 80%",
            onEnter: () => {
                timeline.play();
            }
        });
    }

    
    

    $("[words-slide-up]").each(function (index) {
        let tl = gsap.timeline({ paused: true });
        tl.from($(this).find(".word"), { opacity: 0, yPercent: 100, duration: 0.5, ease: "back.out(2)", stagger: { amount: 0.5 } });
        createScrollTrigger($(this), tl);
    });


    $("[words-rotate-in]").each(function (index) {
        let tl = gsap.timeline({ paused: true });
        tl.set($(this).find(".word"), { transformPerspective: 1000 });
        tl.from($(this).find(".word"), { rotationX: -90, duration: 0.6, ease: "power2.out", stagger: { amount: 0.6 } });
        createScrollTrigger($(this), tl);
    });

    $("[words-slide-from-right]").each(function (index) {
        let tl = gsap.timeline({ paused: true });
        tl.from($(this).find(".word"), { opacity: 0, x: "1em", duration: 0.6, ease: "power2.out", stagger: { amount: 0.2 } });
        createScrollTrigger($(this), tl);
    });
   
    $("[letters-slide-up]").each(function (index) {
        let tl = gsap.timeline({ paused: true });
        tl.from($(this).find(".char"), {delay:0.4, yPercent: 100, duration: 1.5, ease: "power4.out", stagger: { amount: 0.5 } });
        createScrollTrigger($(this), tl);
    });


    $("[letters-slide-down]").each(function (index) {
        let tl = gsap.timeline({ paused: true });
        tl.from($(this).find(".char"), { yPercent: -120, duration: 0.3, ease: "power1.out", stagger: { amount: 0.7 } });
        createScrollTrigger($(this), tl);
    });

    $("[letters-fade-in]").each(function (index) {
        let tl = gsap.timeline({ paused: true });
        tl.from($(this).find(".char"), { opacity: 0, duration: 0.2, ease: "power1.out", stagger: { amount: 0.8 } });
        createScrollTrigger($(this), tl);
    });

    $("[letters-rotate]").each(function (index) { 
        let delay = $(this).attr("data-delay") || 0; // Read the delay attribute or default to 0
        let tl = gsap.timeline({ paused: true });
        tl.set($(this).find(".word"), { perspective: 1000 });
        tl.from($(this).find(".char"), { 
            rotateX: 90, 
            duration: 0.6, 
            ease: "power1.out", 
            stagger: { amount: 0.25 },
            delay: delay // Apply the delay
        });
        createScrollTrigger($(this), tl);
    });

    $("[letters-fade-in-random]").each(function (index) {
        let tl = gsap.timeline({ paused: true });
        tl.from($(this).find(".char"), { opacity: 0, duration: 0.05, ease: "power1.out", stagger: { amount: 0.4, from: "random" } });
        createScrollTrigger($(this), tl);
    });
    $("[line-grow]").each(function (index) {
        let tl = gsap.timeline({ paused: true });
        tl.to($(this), { scaleX: 1, duration: 1, ease: "power1.out"});
        createScrollTrigger($(this), tl);
    });

    // Avoid flash of unstyled content
    gsap.set("[text-split-2]", { opacity: 1 });


    // Define the animations and triggers
    const animations = [
        { trigger: "fade", animation: { opacity: 0, duration: 1, delay: $(this).attr("data-delay") || 0}, start: "top 80%", ease: "linear"},
        { trigger: "fadeslow", animation: { opacity: 0, duration: 2, delay: $(this).attr("data-delay") || 0}, start: "top 80%", ease: "linear"},
        { trigger: "fademove", animation: { opacity: 0, y: 30,duration: 0.8, delay: $(this).attr("data-delay") || 0}, start: "top 80%" },
        { trigger: "fadescale", animation: { opacity: 0, y: 30,scaleY:1.1,duration: 0.8, delay: $(this).attr("data-delay") || 0}, start: "top 80%" },
        { trigger: "scale", animation: { x: 0, y: 20, scaleY: 1.3,opacity: 0, transformOrigin:'top top',duration: 0.6, delay: $(this).attr("data-delay") || 0}, start: "top 80%" },
        { trigger: "move", animation: {  opacity: 0, left:100, duration: 1.6, ease: "power4.out", delay: $(this).attr("data-delay") || 0}, start: "top 80%" },
        { trigger: "scaleX", animation: {  scaleX: 0, duration: 1.6, ease: "power4.out", delay: $(this).attr("data-delay") || 0}, start: "top 80%" },
    ];


    animations.forEach((anim) => {
        const elements = document.querySelectorAll(`[data-trigger='${anim.trigger}']`);
        elements.forEach((element, index) => {
            gsap.from(element, {
                ...anim.animation,
                    scrollTrigger: {
                    trigger: element,
                    start: anim.start,
                    toggleActions: "restart none none reverse",
                },
                delay: parseFloat(element.getAttribute("data-delay")),
            });
        });
    });

    // Hero scrub animation
    gsap.to('.heroScrubAnimation', {
        duration: 1,
        //scale:1.2,
        opacity:0,
        y:'50%',
        ease: "none",
        scrollTrigger: {
            trigger: '.heroScrubAnimation',
            //markers:true,
            start: 'top top', 
            end: '130% top',
            scrub: true,
            onEnter: () => {
                //console.log('onEnter')
            },
            onLeave: () => {
                //console.log('onLeave')
                const videoElement = document.querySelector('.autoplayVideo');
                if (videoElement) {
                    //videoElement.pause();
                }
            },
            onEnterBack: () => {
                //console.log('onEnterBack')
                const videoElement = document.querySelector('.autoplayVideo');
                if (videoElement) {
                    //videoElement.play();
                }
            },
            onLeaveBack: () => {
                //console.log('onLeaveBack')
            }
        }
    });


    // Footer Oom!
    ScrollTrigger.matchMedia({
        "(min-width:767px)": function() {     
            setTimeout(() => {
                gsap.set(".footer-container", { yPercent: -50, opacity:0, rotationX: '-5deg', transformOrigin: '50% 100%'});
                const uncover = gsap.timeline({ paused: true });
                uncover.to(".footer-container", { yPercent: 0, opacity:1, rotationX: '0', ease: "none" });
                ScrollTrigger.create({
                    trigger: ".footer-start",
                    start: "bottom bottom",
                    endTrigger: "footer",
                    end: "bottom bottom",
                    animation: uncover,
                    scrub: true,
                    id: "footer",
                });
            },900 );
        }
    });

    // GSDevTools.create();

    // scroll-zoom="" using scrollTrigger
    const scrollZoom = document.querySelectorAll("[scroll-zoom] img");
    const parentElements = new Set();
    scrollZoom.forEach((element) => {
        const parent = element.closest("[scroll-zoom-trigger]");
        parentElements.add(parent);
    });
    parentElements.forEach((parent) => {
        const images = parent.querySelectorAll("[scroll-zoom] img");
        images.forEach((image) => {
            const parentDiv = image.closest("[scroll-zoom]");
            const rotate = parentDiv.getAttribute("scroll-rotate");
            gsap.from(image, {
                scale: 0,
                rotate: rotate,
                stagger: 0.1, // Stagger the animations by 0.2 seconds
                scrollTrigger: {
                    trigger: parent,
                    start: "20% 70%",
                    end: "bottom 20%",
                    toggleActions: "play none none reverse", // Play on enter, reverse on leave
                },
            });
        });
    });




    
  // Add mouse move effect to scroll-zoom elements
if (!window.matchMedia("(pointer: coarse)").matches) {
    const scrollZoomTriggers = document.querySelectorAll("[scroll-zoom-trigger]");
    
    scrollZoomTriggers.forEach((parent) => {
        const scrollZoomElements = parent.querySelectorAll("[scroll-zoom] picture");
        
        parent.addEventListener("mousemove", (event) => {
            const rect = parent.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            
            scrollZoomElements.forEach((el) => {
                const elRect = el.getBoundingClientRect();
                const elCenterX = elRect.left + elRect.width / 2;
                const elCenterY = elRect.top + elRect.height / 2;
                const distanceX = x - (elCenterX - rect.left);
                const distanceY = y - (elCenterY - rect.top);
                const moveX = distanceX / (rect.width / 2);
                const moveY = distanceY / (rect.height / 2);
        
                gsap.to(el, {
                    x: moveX * -20, // Increased multiplier for more drastic movement
                    y: moveY * -20, // Increased multiplier for more drastic movement
                    rotationY: moveX * -10, // Increased multiplier for more drastic tilt
                    rotationX: -moveY * -10, // Increased multiplier for more drastic tilt
                    transformPerspective: 1000,
                    ease: "power2.out",
                    duration: 1.5, // Add duration for smoother movement
                });
            });
        });
        
        parent.addEventListener("mouseleave", () => {
            scrollZoomElements.forEach((el) => {
                gsap.to(el, {
                    x: 0,
                    y: 0,
                    rotationY: 0,
                    rotationX: 0,
                    ease: "power2.out",
                    duration: 1.5, // Add duration for smoother reset
                });
            });
        });
    });
}



}