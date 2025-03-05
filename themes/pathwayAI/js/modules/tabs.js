export default function tabs() {
    /*TABS*/
    const firstTab = document.querySelector('.tabs li');
    const categorySlug = firstTab.getAttribute('rel');

    $(".tab_container .tab_content").hide();

    // Only 768px and up devices
    $(".tab_container .tab_content[rel^='" + categorySlug + "']").show();

    // if ($(window).width() > 767) {
    //     $(".tabs-holder.tabs-to-accordion .tab_container .tab_content[rel^='tab1']").show();
    // }
    

    $(".tabs-holder .tabs li[rel^='" + categorySlug + "']").addClass('active');
    //$(".tab_drawer_heading[rel^='tab1']").addClass('d_active');

    /* if in tab mode */
    $("ul.tabs li").click(function() {
        var activeTab = $(this).attr("rel");
       
        $(this).closest(".tabs-holder").find(".tab_container .tab_content").hide();
        $(this).closest(".tabs-holder").find(".tab_container .tab_content[rel^='" + activeTab + "']").fadeIn(1200);

        $("#" + activeTab).fadeIn();

        $(this).siblings().removeClass("active");
        $(this).addClass("active");

        $(this).closest(".tabs-holder").find(".tab_container .tab_content .tab_drawer_heading").removeClass("d_active");
        $(this).closest(".tabs-holder").find(".tab_container .tab_content .tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
        
        setTimeout(() => {
            ScrollTrigger.refresh();
        }, 600);
        
    });


    $(".tab_container .tab_content_nested[rel^='nestedTab1']").show();
    $(".tabs-holder .tabs-nested li[rel^='nestedTab1']").addClass('active');
    $(".tab_drawer_heading[rel^='nestedTab1']").addClass('d_active');

    /* if in tab mode */
    $("ul.tabs-nested li").click(function() {
        
        // $('html, body').animate({
        //     scrollTop: $(this).closest(".tabs-holder").offset().top -170
        // }, 500);


        var activeTab = $(this).attr("rel");



        
        $(this).closest(".tabs-holder").find(".tab_container .tab_content_nested").fadeOut(400); // Hide with fade effect over 400ms
        $(this).closest(".tabs-holder").find(".tab_container .tab_content_nested[rel^='" + activeTab + "']").fadeIn(1000); // Fade in over 600ms


        $("#" + activeTab).fadeIn();

        $(this).siblings().removeClass("active");
        $(this).addClass("active");

        $(this).closest(".tabs-holder").find(".tab_container .tab_content_nested .tab_drawer_heading").removeClass("d_active");
        $(this).closest(".tabs-holder").find(".tab_container .tab_content_nested .tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");
        
        setTimeout(() => {
            ScrollTrigger.refresh();
        }, 600);
        
    });

    /* if in drawer mode */
    $(".tab_drawer_heading").click(function() {

        var d_activeTab = $(this).attr("rel");

        $(this).next().slideToggle();
        $(this).toggleClass("d_active");
        $("ul.tabs li").removeClass("active");
        $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");

        setTimeout(() => {
            ScrollTrigger.refresh();
        }, 600);

    });
}