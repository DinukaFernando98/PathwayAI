// Default imports
import { animationsText } from './modules/animations-text.js';
import { lazyload } from './modules/lazyload.js';
import { nav } from './modules/nav.js';
import { buttonHovers } from './modules/buttons.js';

nav();

const lenis = new Lenis({
    lerp: 0.04,
    wheelMultiplier: 0.8,
    smooth: true,
    duration: 1.3,
    direction: "vertical",
    smoothTouch: false,
})

function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}
requestAnimationFrame(raf)

lenis.stop();

document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.body.classList.add("website-loaded");


        // Swipe da loader up
        gsap.to(".loading-screen", {
            scaleY: 0,
            duration: 2,
            delay: 1,
            ease: "power4.out",
            onComplete: function () {
                lenis.start();
            },
        });

        gsap.from($("[anim-nav]"), {
            delay: 1.5,
            y: '-100%',
            duration: 1,
        });

        gsap.from($("[anim-chars]"), {
            delay:2.5,
            opacity: 0,
            duration: 1.5,
            onComplete: function () {
                ScrollTrigger.refresh();
            }
        });

        gsap.from($("[anim-fade]"), {
            delay: 2.5,
            opacity: 0,
            duration: 1.5,

        });




    }, 100);

});


// Add Gsap plugins
gsap.registerPlugin(ScrollTrigger);


barba.hooks.beforeEnter ((data) => {

})


barba.hooks.afterEnter ((data) => {

    lazyload();
    buttonHovers();

    setTimeout(() => {
        //contactForm7ThankYou();
        $('.autoplayVideo').each(function() {
            this.play();
        });
    }, 50);

    setTimeout(() => {
        animationsText();
    }, 50);

    if ( window.location.hash ) {
        setTimeout(function() {
            $('html,body').animate({
            scrollTop: $(window.location.hash).offset().top - 80
            }, 1000);
        }, 100);
    }

    $("a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            if (typeof lenis !== "undefined" && typeof lenis.scrollTo === "function") {
                lenis.scrollTo(hash, {
                    duration: 1,
                    offset: -80
                });
            } else {
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - 80
                }, 1000, function () {
                    window.location.hash = hash;
                });
            }
        }
    });



    $(document).on('lity:open', function () {
        lenis.stop();
        $('.lity').attr('data-lenis-prevent', '');
        $('video').each(function() {
            this.pause();
        });
    });

    $(document).on('lity:close', function () {
        lenis.start();
        $('video').each(function() {
            this.play();
        });
    });




    // Page specific functions
    const createFunctionExecutionTracker = () => {
        const executedFunctions = new Set();
        return (functionName) => {
            if (!executedFunctions.has(functionName)) {
                executedFunctions.add(functionName);
                return true;
            }
            return false;
        };
    };
    const shouldExecuteFunction = createFunctionExecutionTracker();
    const targetElement = data.next.container;
    const elementsWithFunction = targetElement.querySelectorAll('[data-function]');
    elementsWithFunction.forEach(async (element) => {
        const functionName = element.dataset.function;
        const delay = parseInt(element.dataset.functionDelay, 10) || 0;
        if (shouldExecuteFunction(functionName)) {
            try {
                const { default: dynamicFunction } = await import(`./modules/${functionName}.js?v=31`);
                if (typeof dynamicFunction === 'function') {
                    setTimeout(() => {
                        dynamicFunction();
                    }, delay);
                } else {
                    console.warn(`Module for ${functionName} does not export a function.`);
                }
            } catch (error) {
                console.log(`Module for ${functionName} does not exist.`);
            }
        }
    });

    // ASD-167 Google Ads conversion tracking. NOTE: AW-878518428 is added via HubSpot...
    if (window.location.pathname === '/thank-you') {
        gtag('event', 'conversion', {'send_to': 'AW-878518428/i6IhCNHJwOYZEJzB9KID'});
    }

})

let isFirstLoad = true;
barba.hooks.beforeLeave ((data) => {
    const updateItems = $(data.next.html).find('[data-barba-update]');
    $('[data-barba-update]').each(function(index) {
        const updateItem = $(updateItems[index]).get(0);
        if (updateItem) {
            const newClasses = updateItem.classList.value;
            setTimeout(() => {
                $(this).attr('class', newClasses);
            }, 50 );
        }
    });

    isFirstLoad = false;

    document.querySelector('html').classList.add('transitioning');


    $('body').removeClass('body-menu-opened');
    $('.main-nav').removeClass('menu-opened');
    $('.menu-item-has-children').removeClass('menu-hovered');

    $('.nav-holder').removeClass('nav-change');
    $('.nav-holder').removeClass('nav-show');
    $('.nav-holder').removeClass('nav-hide');
    $('.nav-primary > li.menu-item-has-children > a').removeClass('open');


    setTimeout(() => {
        $('body').removeClass().addClass('website-loaded');
    },300 );

    $('.nav-holder').removeAttr('data-lenis-prevent');
})



barba.hooks.afterLeave ((data) => {
    let triggers = ScrollTrigger.getAll();
    triggers.forEach(trigger => {
        let triggerElement = typeof trigger.trigger === 'string' ? document.querySelector(trigger.trigger) : trigger.trigger;
        if (triggerElement && triggerElement.closest('[data-barba="container"]')) {
            //trigger.kill();
        }
    });

})

barba.hooks.enter ((data) => {
    // Capcha
    // setTimeout(() => {

    //     (function() {
    //         var gr = document.createElement('script');
    //         gr.type = 'text/javascript';
    //         gr.async = true;
    //         gr.src = 'https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoad&render=explicit';
    //         var s = document.getElementsByTagName('script')[0];
    //         s.parentNode.insertBefore(gr, s);
    //     })();
    //     function onRecaptchaLoad() {
    //         noCaptchaFieldRender();
    //     }
    //     noCaptchaFieldRender();
    //     // Capcha
    // },2000);
})

barba.init({
    debug: true,
    timeout: 8000,
    // Namespace for the current page
    views: [
        {
            namespace: 'single',
            beforeEnter (data){

            },
            afterEnter (data){

            }
        },
    ],
    transitions: [{
        sync: true,
        name: 'opacity-transition',
        leave(data) {
            lenis.stop();

            // Set layer opacity on current outgoing container
            gsap.set(data.current.container.querySelector(".transition-layer"), {  opacity:1});
            return gsap.to(data.current.container, {
                duration: 1.5,
                //clipPath: "inset(100% 0% 0% 0%)", /* Top to Bottom */
                //clipPath: "inset(0% 0% 100% 0%)", /* Bottom to Top */
                clipPath: "inset(0% 0% 0% 100%)", /* Left to Right */
                //clipPath: "inset(0% 100% 0% 0%)", /* Right to Left */
                //x:'-50%',
                ease: "power4.out",
                onComplete: () => {
                    data.current.container.style.display = 'none';
                }
            });
        },

        enter(data) {
            // Add class while transitioning
            setTimeout(() => {
                document.querySelector('html').classList.remove('transitioning');
            },1500);

            // Transition in text animations for next container
            let typeSplit = new SplitType(data.next.container.querySelectorAll("[text-split-2]"), {
                types: "words, chars",
                tagName: "span"
            });

            gsap.from(data.next.container.querySelectorAll("[anim-chars]"), {
                delay: 1.4,
                opacity: 0,
                duration: 0.6,
                onComplete: function () {
                    ScrollTrigger.refresh();
                }
            });

            gsap.from(data.next.container.querySelectorAll("[anim-fade]"), {
                delay: 1.6,
                opacity: 0,
                duration: 0.6,
            });


            // Set next container to fixed position
            gsap.set(data.next.container, {  position: "fixed", zIndex:"1", inset:"0", display: "block"});

            // Next container animation
            return {
                timeout: setTimeout(() => {
                    $('.main-nav').removeClass('nav-change');
                }, 1000),
                animation: gsap.from(data.next.container, {
                    // Clip path reveal
                    //clipPath: "inset(0% 0% 100px 0%)", /* Top to Bottom */
                    //clipPath: "inset(100% 0% 0% 0%)", /* Bottom to Top */
                    clipPath: "inset(0% 100% 0% 0%)", /* Left to Right */
                    //clipPath: "inset(0% 0% 0% 100%)", /* Right to Left */
                    duration: 1.5,
                    ease: "power4.out",
                    onComplete: () => {
                        window.scrollTo(0, 0);
                        data.next.container.style.display = 'block';
                        gsap.set(data.next.container, { clearProps: 'all' }); // Remove position: "fixed"
                        setTimeout(() => {
                            lenis.start();
                            //ScrollTrigger.refresh();
                        },50 );
                    }
                })
            };
        }
    }]


});
