<!-- Hero_Vacancies -->
<div class="d-flex justify-content-center flex-column position-relative">
	<div class="image-bg w-100  mask-bottom heroScrubAnimation">
		<img src="$ThemeDir/img/placeholders/single-hero.jpg" class="opacity-25" alt="">
	</div>
	<div class="spacer"></div>
	<div class="container py-4 position-relative">
		<div class="grid align-items-center">
			<div class="g-row-start-md-1   g-start-1 g-col-12   g-start-md-8 g-col-md-5   d-flex justify-content-center">
				<div class="ratio user-select-none w-small-md-down" anim-fade="" style="--bs-aspect-ratio: 75.67%;--bs-aspect-ratio-mobile: 75.67%;" scroll-zoom-trigger="">
					<div class="d-flex">
						<picture class="rounded">
							<img src="$ThemeDir/img/placeholders/event.jpg" class="rounded" alt="" title="">
						</picture>
					</div>
				</div>
			</div>
			<section class="py-5    g-row-start-md-1   g-start-1 g-col-12   g-start-md-1 g-col-md-6   position-relative">
                <h1 class="fs-6 fw-semibold text-green" anim-chars="" text-split="">Find Your Next Career Move!</h1>  
                <h2 class="h1 pb-xl-2" anim-chars="" text-split="">Discover job openings that align with your goals and aspirations. Start applying today and unlock new possibilities!</h2>                  
				<div class="d-inline-block" anim-fade=""> 
					<a href="#vacancies" class="btn icon">
						<div class="button-fill"></div>
						<strong>
							<span data-hover="View vacancies">View vacancies</span>
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

<!-- Vacancy Listing -->
<section class="pt-5" data-function="load-more">
	<div class="container load-more-container" anim-fade="">
		<p class="filter-heading mb-0">Latest vacancies:</p>
		<div class="border-top border-bottom" style="--bs-border-color:var(--bs-green)"></div>
		<div class="min-vh-100" id="vacancies">
			<div class="row g-4 mt-5">
				<% loop $getVacancies %>
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm border-white h-100 rounded" style="background-color: transparent; border: 1px solid white;">
                            <div class="card-body text-white text-left p-4">
                                <h5 class="card-title">$Title</h5>
                                <p class="card-text">$Company.Name</p>
                                <p class="text-white small">Location: $Location | $Type</p>
                                <a href="/job/$ObfuscatedID" class="btn btn-green">Apply Now</a>
                            </div>
                        </div>
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
</section>