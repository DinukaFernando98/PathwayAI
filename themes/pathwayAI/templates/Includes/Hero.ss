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
            <a href="cyber-security.html">
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
            <a href="configuration-change.html">
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
            <a href="obsolescence.html">
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