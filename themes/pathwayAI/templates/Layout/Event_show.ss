<% if $Event %>
    <!-- HeroSingle -->
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
                    <h1 class="fs-6 fw-semibold text-green" anim-chars="" text-split="">$Event.Type |  <% if $Event.Date %> $Event.FormattedDate <% else %> Date TBA <% end_if %></h1>
                    <h2 class="h1" anim-chars="" text-split="">$Event.Title</h2>
                    <p anim-chars="" text-split=""><em>$Event.Company.Name</em></p>
                    <div class="d-inline-block mt-4" anim-fade="">
                        <a href="#register" class="btn icon no-rotate" onclick="event.preventDefault(); document.getElementById('register').scrollIntoView({ behavior: 'smooth' });">
                            <div class="button-fill"></div>
                            <strong>
                                <span data-hover="Register now">Register now</span>
                            </strong>
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="47" viewBox="0 0 46 47">
                                    <ellipse id="Ellipse_160" data-name="Ellipse 160" cx="23" cy="23.5" rx="23" ry="23.5" fill="#d8f96f"></ellipse>
                                    <path id="download_24dp_FILL0_wght400_GRAD0_opsz24" d="M168.5-787.7a1.175,1.175,0,0,1-.4-.066.932.932,0,0,1-.345-.226l-3.825-3.825a.973.973,0,0,1-.305-.744,1.121,1.121,0,0,1,.305-.744,1.084,1.084,0,0,1,.757-.332.989.989,0,0,1,.757.305l1.992,1.992v-7.6a1.028,1.028,0,0,1,.305-.757A1.028,1.028,0,0,1,168.5-800a1.028,1.028,0,0,1,.757.306,1.028,1.028,0,0,1,.305.757v7.6l1.992-1.992a.989.989,0,0,1,.757-.305,1.083,1.083,0,0,1,.757.332,1.121,1.121,0,0,1,.305.744.973.973,0,0,1-.305.744l-3.825,3.825a.932.932,0,0,1-.345.226A1.175,1.175,0,0,1,168.5-787.7Zm-6.375,4.7a2.046,2.046,0,0,1-1.5-.624,2.046,2.046,0,0,1-.624-1.5v-2.125a1.028,1.028,0,0,1,.305-.757,1.028,1.028,0,0,1,.757-.306,1.028,1.028,0,0,1,.757.306,1.028,1.028,0,0,1,.305.757v2.125h12.75v-2.125a1.028,1.028,0,0,1,.305-.757,1.028,1.028,0,0,1,.757-.306,1.028,1.028,0,0,1,.757.306,1.028,1.028,0,0,1,.305.757v2.125a2.046,2.046,0,0,1-.624,1.5,2.046,2.046,0,0,1-1.5.624Z" transform="translate(-145 815)" fill="#141f3e"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="47" viewBox="0 0 46 47">
                                    <ellipse id="Ellipse_160" data-name="Ellipse 160" cx="23" cy="23.5" rx="23" ry="23.5" fill="#141f3e"></ellipse>
                                    <path id="download_24dp_FILL0_wght400_GRAD0_opsz24" d="M168.5-787.7a1.175,1.175,0,0,1-.4-.066.932.932,0,0,1-.345-.226l-3.825-3.825a.973.973,0,0,1-.305-.744,1.121,1.121,0,0,1,.305-.744,1.084,1.084,0,0,1,.757-.332.989.989,0,0,1,.757.305l1.992,1.992v-7.6a1.028,1.028,0,0,1,.305-.757A1.028,1.028,0,0,1,168.5-800a1.028,1.028,0,0,1,.757.306,1.028,1.028,0,0,1,.305.757v7.6l1.992-1.992a.989.989,0,0,1,.757-.305,1.083,1.083,0,0,1,.757.332,1.121,1.121,0,0,1,.305.744.973.973,0,0,1-.305.744l-3.825,3.825a.932.932,0,0,1-.345.226A1.175,1.175,0,0,1,168.5-787.7Zm-6.375,4.7a2.046,2.046,0,0,1-1.5-.624,2.046,2.046,0,0,1-.624-1.5v-2.125a1.028,1.028,0,0,1,.305-.757,1.028,1.028,0,0,1,.757-.306,1.028,1.028,0,0,1,.757.306,1.028,1.028,0,0,1,.305.757v2.125h12.75v-2.125a1.028,1.028,0,0,1,.305-.757,1.028,1.028,0,0,1,.757-.306,1.028,1.028,0,0,1,.757.306,1.028,1.028,0,0,1,.305.757v2.125a2.046,2.046,0,0,1-.624,1.5,2.046,2.046,0,0,1-1.5.624Z" transform="translate(-145 815)" fill="#d8f96f"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- END HeroSingle -->

    <!-- ContentSingle -->
    <section class="py-0 my-5 position-relative">
        <div class="container" anim-fade=" ">
            <div class="grid">
                <div class="g-start-1 g-col-12    g-start-lg-2  g-col-lg-10  g-start-xxl-4 g-col-xxl-6">
                    <div class="content-section content-section-2">
                        $Event.Content
                    </div>
                </div>
            </div>  
        </div>
    </section>
    <!-- END ContentSingle -->

    <% include EventForm %>
     
<% end_if %>
