export default function loadMore() {
    /* Load more 1 */
    $(".load-more-container .load-more-item").slice(0, 6).fadeIn({
       start: function () {
         $(this).css({
           display: "block"
         });
         setTimeout(function(){ 
             ScrollTrigger.refresh()
         }, 600);
       }
     });

     
     if ($(".load-more-container .load-more-item").length > 6) {
         $(".load-more-container .load-more-button").css({
             display: "flex"
         })
     }
     $(".load-more-container .load-more-button").on("click", function(e) {
         e.preventDefault();
         event.preventDefault();
         $(".load-more-container .load-more-item:hidden").slice(0, 6).fadeIn ({
             duration: 600,
             ease: "easeInOutCirc", 
             start: function() {
                 $(this).css({
                     display: "block"
                 });
                 setTimeout(function(){ 
                     ScrollTrigger.refresh()
                 }, 600);
             }
         });
         if ($(".load-more-container .load-more-item:hidden").length == 0) {
             $(".load-more-container .load-more-button").slideUp();
         }
     });


     // Dropdown
     $('.openDropdown').on('click', function(j) {
        j.stopPropagation(); // Prevent the click event from propagating to the document
        $('.openDropdown').not(this).removeClass('open').find('.dropdown-menu').slideUp();
        $(this).toggleClass('open').find('.dropdown-menu').slideToggle();
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.openDropdown').length) {
            $('.openDropdown').removeClass('open').find('.dropdown-menu').slideUp();
        }
    });

    // Prevent dropdown from closing when clicking on a checkbox
    $('.dropdown-menu').on('click', function(e) {
        e.stopPropagation();
    });

    /* Dinuka code for dropdown and multi-category filtering */
    $(document).ready(function() {
        let selectedCategorySlugs = [];
        $(".dropdown-menu input[type='checkbox']").change(function() {
            const categorySlug = $(this).val();
            if ($(this).is(':checked')) {
                selectedCategorySlugs.push(categorySlug);
            } else {
                selectedCategorySlugs = selectedCategorySlugs.filter(slug => slug !== categorySlug);
            }
            filterArticles();
             // Show the clear button if any checkbox is checked
            if (selectedCategorySlugs.length > 0) {
                $('.clearIt').show();
            } else {
                $('.clearIt').hide();
            }
        });
        
        // Clear all checkboxes when the clear button is clicked
        $('.clearIt').on('click', function() {
            $(".dropdown-menu input[type='checkbox']").prop('checked', false);
            selectedCategorySlugs = [];
            filterArticles();
            $(this).hide();
        });

        function filterArticles() {
            // Hide other articles after filtering
            $(".load-more-item").hide();
            if (selectedCategorySlugs.length > 0) {
                selectedCategorySlugs.forEach(slug => {
                    $(".load-more-item[rel*='" + slug + "']").fadeIn(1200);
                });
            } else {
                $(".load-more-item").fadeIn(1200);
            }
            setTimeout(() => {
                ScrollTrigger.refresh();
            }, 600);
        }
    });


    // Initial display
    var initialCategorySlug = $(".dropdown-menu li:first").attr("rel");
    $(".load-more-item[rel*='" + initialCategorySlug + "']").show();


}