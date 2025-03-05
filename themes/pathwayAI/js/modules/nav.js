export function nav(event) {



    gsap.to("body", {
        scrollTrigger: {
        trigger: "main",
            //start: () => "+=" + document.querySelector(".nav-holder").offsetHeight,
            start: "top+=10 top",
            end: 'bottom top-=99999999',
            //markers:{ endColor: "pink",},
            toggleClass: {
                targets: '.nav-holder',
                className: 'nav-moved',
            },
        }
    });

    gsap.to("body", {
        scrollTrigger: {
        trigger: "main",
            //start: () => "+=" + document.querySelector(".header-home-content").offsetHeight*0.9,
            //start: () => "+=" + document.querySelector(".nav-holder").offsetHeight*4,
            start: "top+=10 top",
            end: 'bottom top-=99999999',
            //markers:{ endColor: "pink",},
            toggleClass: {
                targets: '.nav-holder',
                className: 'nav-moved-background',
            },
        }
    });

    
    /* Hide Header Nav on on scroll down */
    ScrollTrigger.create({
        start: "top top",
        end: "max",
        onUpdate: (self) => {
            if (self.direction === -1) {
            // Scroll Up
            $('.nav-holder, .nav-overlay').removeClass('nav-scroll-down').addClass('nav-scroll-up');
            } else {
            // Scroll Down
            $('.nav-holder, .nav-overlay').addClass('nav-scroll-down').removeClass('nav-scroll-up');
            }
        }
    });
    /* END Hide Header Nav on on scroll down */

    


    $('.menu-opener, .nav-overlay').click(function(){
        $('nav').toggleClass('menu-opened');
        $('body').toggleClass('body-menu-opened');
        // Toggle this data attribute data-lenis-prevent on .nav-primary
        $('.nav-primary').each(function() {
            if ($(this).attr('data-lenis-prevent')) {
                $(this).removeAttr('data-lenis-prevent');
            } else {
                $(this).attr('data-lenis-prevent', '');
            }
        });


        


    });

    $(".nav-primary > li.menu-item-has-children > a").click(function(e) {
        $(this).toggleClass('open');
        $(this).parent().toggleClass("open");
    })

    $(".touchevents .nav-primary > li.menu-item-has-children > a, .no-link > a").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
    })


    $('.no-touchevents .nav-primary .menu-item-has-children').mouseover(function() {
        $(this).addClass('menu-hovered');
        $(this).siblings().addClass('pe-none');
        $('body').addClass('menu-open');
        $('body').addClass('nav-invert-hover');
    });
    $('.no-touchevents .nav-primary .menu-item-has-children').mouseleave(function() {
        $(this).removeClass('menu-hovered');
        $('body').removeClass('menu-open');
        $('body').removeClass('nav-invert-hover');

        setTimeout(() => {
            $(this).siblings().removeClass('pe-none');
        }, 50);
    });


    $('.touchevents .nav-primary .menu-item-has-children').mouseover(function() {
        $(this).addClass('menu-hovered');
        $('body').addClass('menu-open');
        $('body').addClass('nav-invert-hover');
    });
    $('.touchevents .nav-primary .menu-item-has-children').mouseleave(function() {
        $(this).removeClass('menu-hovered');
        $('body').removeClass('menu-open');
        $('body').removeClass('nav-invert-hover');
    });
    


    // Language switcher
    
    /* Open Login */
    $('.no-touchevents .nav-lang').mouseover(function() {
        $(this).addClass('login-hovered');
    });
    /* Close Login */
    $('.no-touchevents .nav-lang').mouseleave(function() {
        $(this).removeClass('login-hovered');
    });


    $('.touchevents .nav-lang').bind('click', function() {
        $(this).toggleClass('login-hovered');
    });
    /* Close Login */
    $('.touchevents .nav-lang').mouseleave(function() {
        $(this).removeClass('login-hovered');
    });


    
}
