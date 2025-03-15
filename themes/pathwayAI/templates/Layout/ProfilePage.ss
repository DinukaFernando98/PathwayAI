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

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <% if $getLoggedInUser.ProfilePhoto %>
                    <img src="$getLoggedInUser.ProfilePhoto.URL" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                <% else %>
                    <img src="$ThemeDir/img/placeholders/profile.png" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                <% end_if %>
                <h5 class="mt-3">$getLoggedInUser.FirstName $getLoggedInUser.LastName</h5>
                <div class="text-left">
                    <p>Email: $getLoggedInUser.Email</p>
                    <p>Phone: $getLoggedInUser.Phone</p>
                </div>

                <% if $getLoggedInUser.CV %>
                    <a href="$getLoggedInUser.CV.URL" class="btn btn-secondary btn-sm mt-2 mb-4" download style="width: 50%; justify-self: center;">Download CV</a>
                <% end_if %>
            </div>
        </div>

        <div class="container bg-white rounded col-md-8 pt-4 pb-4" style="--bs-bg-opacity:0.17">
            <div class="card p-4">
                <h4>Edit Profile</h4>
                $ProfileForm
            </div>
        </div>
    </div>
</div>

<div class="container" data-function="load-more">
    <div class="container load-more-container" anim-fade="">
        <hr class="my-5">
        <h3 class="mb-0">Registered Events</h3>
        <div class="min-vh-100">
            <div class="row g-4 mt-4">
                <% loop $getRegisteredEvents %>
                    <div class="col-sm-6 col-xl-4 load-more-item">
                        <a href="/event/$Event.ObfuscatedID" class="d-block h-100 d-flex flex-column rounded card-2">
                            <div>
                                <div class="ratio overflow-hidden" style="--bs-aspect-ratio: 59.7%;--bs-aspect-ratio-mobile: 59.7%;">
                                    <picture>
                                        <% if $Event.Image %>
                                            <img data-src="$Event.Image.URL" class="lazy blur zoom-on-hover mx-auto" alt="" title="">
                                        <% else %>
                                            <img data-src="$ThemeDir/img/placeholders/event-single.jpg" class="lazy blur zoom-on-hover mx-auto" alt="" title="">
                                        <% end_if %>
                                    </picture>
                                </div>
                            </div>
                            <div class="h-100 d-flex flex-column p-4 p-xxl-5">
                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap gap-1 mb-4">
                                        <p class="fw-semibold text-green mb-0">$Event.Type | <% if $Event.Date %> $Event.FormattedDate <% else %> Date TBA <% end_if %></p>                                        
                                    </div>
                                    <p class="fs-5 fw-semibold lh-sm mb-4"><span class="underline-on-hover">$Event.Title</span></p>
                                    <p class=""><span class="underline-on-hover">$Event.Company.Name</span></p>
                                </div>
                                <p class="mb-1 lh-sm fw-semibold d-flex align-items-center bt">
                                    <span class="me-2">Read more</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <circle id="Ellipse_167" data-name="Ellipse 167" cx="10" cy="10" r="10" fill="#d8f96f"/>
                                        <path id="arrow_back_FILL0_wght500_GRAD0_opsz24" d="M159.213-802.438,155.88-799.1l.989.974,5-5-5-5-.989.974,3.333,3.333h-7.344v1.387Z" transform="translate(-146.869 813.131)"/>
                                    </svg>
                                </p>
                            </div>
                        </a>
                    </div>
                <% end_loop %>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <div class="d-inline-block">
                <a href="#" class="btn sm bright-blue icon no-rotate load-more-button mt-5">
                    <div class="button-fill"></div>
                    <strong>
                        <span data-hover="Load more">Load more</span>
                    </strong>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 46 47">
                            <ellipse id="Ellipse_160" data-name="Ellipse 160" cx="23" cy="23.5" rx="23" ry="23.5" fill="#fff"/>
                            <path id="Path_26746" data-name="Path 26746" d="M8504.5-4235h-3v-8.5H8493v-3h8.5v-8.5h3v8.5h8.5v3h-8.5Z" transform="translate(-8479.5 4268.502)" fill="#141f3e"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 46 47">
                            <ellipse id="Ellipse_160" data-name="Ellipse 160" cx="23" cy="23.5" rx="23" ry="23.5" fill="#141f3e"/>
                            <path id="Path_26746" data-name="Path 26746" d="M8504.5-4235h-3v-8.5H8493v-3h8.5v-8.5h3v8.5h8.5v3h-8.5Z" transform="translate(-8479.5 4268.502)" fill="#fff"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>