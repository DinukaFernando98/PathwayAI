<% if $ClassName == 'PathwayAI\Models\Page\HomePage' %>
<!-- Hero_Homepage -->
<div class="min-vh-100 d-flex justify-content-center flex-column position-relative">
    <div class="video-bg w-100 mask-bottom heroScrubAnimation">
        <video src="/_resources/themes/pathwayAI/videos/home-video.mp4" playsinline="" muted="muted" loop="loop" autoplay="" id="home-video" class="autoplayVideo opacity-25"></video>
    </div>
    <div class="spacer"></div>
    <div class="container py-4 text-center position-relative">
        <h1 class="display-3 pb-xl-2 mx-auto" style="max-width: 22ch;" anim-chars="" text-split="">Your Ultimate Career <strong>Companion.</strong></h1>
        <p class="h5 mb-6 pb-xl-4" anim-fade="">Explore top courses, job fairs, university programs, and career opportunities.</p>
        <div class="d-md-inline-flex flex-column flex-md-row justify-content-center text-start text-md-center link-list-1 user-select-none" anim-fade="">
            <a href="/courses">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
                        <path d="M4,44H-4V0H4Z" transform="translate(4)" fill="currentColor"/>
                        <path d="M4,44H-4V0H4Z" transform="translate(22)" fill="currentColor"/>
                        <path d="M4,44H-4V0H4Z" transform="translate(40)" fill="currentColor"/>
                    </svg>
                </span>
                <div class="h6 mb-0 fw-bold mt-1 mt-md-4 text-nowrap">Courses</div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 42 42">
                        <circle id="Ellipse_138" data-name="Ellipse 138" cx="21" cy="21" r="21" fill="#fff" opacity="0.4"></circle>
                        <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M17,26l-1.181-1.209,6.947-6.947H8V16.156H22.766L15.819,9.209,17,8l9,9Z" transform="translate(4 4)" fill="#141f3e"></path>
                    </svg>
                </div>
            </a>
            <div class="seperator">&nbsp;</div>
            <a href="/job-portal">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="47" viewBox="0 0 54 47">
                        <path d="M13.5,0,27,24H0Z" transform="translate(0 23)" fill="currentColor"/>
                        <path d="M13.5,0,27,24H0Z" transform="translate(27 23)" fill="currentColor"/>
                        <path d="M13.5,0,27,23H0Z" transform="translate(14)" fill="currentColor"/>
                    </svg>
                </span>
                <div class="h6 mb-0 fw-bold mt-1 mt-md-4 text-nowrap">Vacancies</div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 42 42">
                        <circle id="Ellipse_138" data-name="Ellipse 138" cx="21" cy="21" r="21" fill="#fff" opacity="0.4"></circle>
                        <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M17,26l-1.181-1.209,6.947-6.947H8V16.156H22.766L15.819,9.209,17,8l9,9Z" transform="translate(4 4)" fill="#141f3e"></path>
                    </svg>
                </div>
            </a>
            <div class="seperator">&nbsp;</div>
            <a href="/events">
                <span> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="20" viewBox="0 0 76 20">
                        <path d="M10,0A10,10,0,1,1,0,10,10,10,0,0,1,10,0Z" fill="currentColor"/>
                        <path d="M10,0A10,10,0,1,1,0,10,10,10,0,0,1,10,0Z" transform="translate(28)" fill="currentColor"/>
                        <path d="M10,0A10,10,0,1,1,0,10,10,10,0,0,1,10,0Z" transform="translate(56)" fill="currentColor"/>
                    </svg>
                </span>
                <div class="h6 mb-0 fw-bold mt-1 mt-md-4 text-nowrap">Events</div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 42 42">
                        <circle id="Ellipse_138" data-name="Ellipse 138" cx="21" cy="21" r="21" fill="#fff" opacity="0.4"></circle>
                        <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M17,26l-1.181-1.209,6.947-6.947H8V16.156H22.766L15.819,9.209,17,8l9,9Z" transform="translate(4 4)" fill="#141f3e"></path>
                    </svg>
                </div>
            </a>
        </div>
    </div>
    <div class="py-5 py-sm-4"></div>
</div>

<% else_if $URLSegment == 'about' %>

<div class="d-flex justify-content-center flex-column position-relative">
    <div class="image-bg w-100 mask-left heroScrubAnimation">
        <img src="$ThemeDir/img/blocks/bg-1.jpg" class="opacity-25" alt="">
    </div>
    <div class="spacer"></div>
    <div class="container py-4 position-relative">
        <div class="grid align-items-center">
            <div class="g-row-start-md-1   g-start-1 g-col-12   g-start-md-8 g-col-md-5   d-flex justify-content-center">
                <div class="ratio user-select-none w-small-md-down" anim-fade="" style="--bs-aspect-ratio: 100%;--bs-aspect-ratio-mobile: 100%;" scroll-zoom-trigger="">
                    <div class="d-flex align-items-center justify-content-center">
                        <picture class="rounded" style="width: 93.58%;">
                            <img src="$ThemeDir/img/blocks/bulb.jpg" class="rounded" alt="" title="">
                        </picture>
                    </div>
                    <div class="screen-shot d-flex align-items-start ms-5 ps-xl-5" scroll-zoom="0" scroll-rotate="20">
                        <picture class="rounded" style="width: 42.26%;">
                            <img src="$ThemeDir/img/blocks/office-3.jpg" class="rounded" alt="" title="">
                        </picture>
                    </div>
                    <div class="screen-shot d-flex align-items-end justify-content-start ms-4 ms-xl-5" scroll-zoom="0" scroll-rotate="-20">
                        <picture class="rounded bottom-0" style="width: 48.38%;">
                            <img src="$ThemeDir/img/blocks/office-6.jpg" class="rounded" alt="" title="">
                        </picture>
                    </div>
                    <div class="screen-shot d-flex align-items-center justify-content-end mt-3" scroll-zoom="0" scroll-rotate="10">
                        <picture class="rounded bottom-0" style="width: 33.82%;">
                            <img src="$ThemeDir/img/blocks/office-4.jpg" class="rounded" alt="" title="">
                        </picture>
                    </div>
                </div>
            </div>
            <section class="py-5    g-row-start-md-1   g-start-1 g-col-12   g-start-md-1 g-col-md-6   position-relative">
                <h1 class="fs-6 fw-semibold text-green" anim-chars="" text-split="">About us</h1>
                <h2 class="h1 pb-xl-2" anim-chars="" text-split="">Shape Your Future with AI-Powered <strong>Career Guidance</strong></h2>
                <p class="h5 mb-6 pb-xl-4 mw-810" anim-fade="">Discover personalized career roadmaps, real-time job market insights, and skill-building opportunities—all in one powerful platform. </p>
                <div class="d-inline-block" anim-fade=""> 
                    <a href="#read-more" class="btn icon">
                        <div class="button-fill"></div>
                        <strong>
                            <span data-hover="Read more">Read more</span>
                        </strong>
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42">
                                <circle id="Ellipse_138" data-name="Ellipse 138" cx="21" cy="21" r="21" fill="#d8f96f"></circle>
                                <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M17,26l-1.181-1.209,6.947-6.947H8V16.156H22.766L15.819,9.209,17,8l9,9Z" transform="translate(4 4)" fill="#141f3e"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42">
                                <circle id="Ellipse_138" data-name="Ellipse 138" cx="21" cy="21" r="21" fill="#141f3e"></circle>
                                <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M17,26l-1.181-1.209,6.947-6.947H8V16.156H22.766L15.819,9.209,17,8l9,9Z" transform="translate(4 4)" fill="#d8f96f"></path>
                            </svg>
                        </div>
                    </a>
                </div>
            </section>
        </div>
    </div>
    <div class="py-5 py-sm-4 d-none d-lg-block"></div>
</div>

<% else %>
<!-- Hero_single -->
<div class="d-flex justify-content-center flex-column position-relative">
    <div class="image-bg w-100  mask-bottom heroScrubAnimation">
        <% if $Image %>
            <img src="$Event.Image.URL" class="opacity-25">
        <% else %>
            <img src="$ThemeDir/img/placeholders/event-single.jpg" class="opacity-25">
        <% end_if %>
    </div>
    <section class="container position-relative text-center">
        <div class="grid">
            <div class="g-start-1 g-col-12    g-start-lg-2  g-col-lg-10  g-start-xxl-3 g-col-xxl-8">
                <div class="spacer"></div>
                <h2 class="h1" anim-chars="" text-split=""><% if $Heading %> $Heading <% else %> $Title <% end_if %></h2>
                <p anim-chars="" text-split=""><em>$Subheading</em></p>
            </div>
        </div>
    </section>
</div>

<% end_if %>