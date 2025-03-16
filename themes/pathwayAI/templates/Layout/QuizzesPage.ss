<!-- Hero_Quizes -->
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
				<h1 class="fs-6 fw-semibold text-green" anim-chars="" text-split="">Explore, Learn, Connect!</h1>
				<h2 class="h1 pb-xl-2" anim-chars="" text-split="">Discover career-boosting quizes, from expert-led workshops to exclusive job fairs. Your next big break starts here!</h2>
				<div class="d-inline-block" anim-fade=""> 
					<a href="#quizzes" class="btn icon">
						<div class="button-fill"></div>
						<strong>
							<span data-hover="View quizzes">View quizzes</span>
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

<!-- Quizes Listing -->
<section class="pt-5" data-function="load-more">
	<div class="container load-more-container" anim-fade="">
		<p class="filter-heading mb-0">Latest quizes:</p>
		<div class="border-top border-bottom" style="--bs-border-color:var(--bs-green)"></div>
		<div class="min-vh-100" id="quizzes">
			<div class="row g-4 mt-5">
				<% loop $getQuizzes %>
					<div class="col-sm-6 col-xl-4 load-more-item">
						<a href="$Link" class="d-block h-100 d-flex flex-column rounded card-2">
							<div>
								<div class="ratio overflow-hidden" style="--bs-aspect-ratio: 59.7%;--bs-aspect-ratio-mobile: 59.7%;">
									<picture>
										<% if $Image %>
											<img data-src="$Image.URL" class="lazy blur zoom-on-hover mx-auto" alt="" title="">
										<% else %>
											<img data-src="$ThemeDir/img/placeholders/event-single.jpg" class="lazy blur zoom-on-hover mx-auto" alt="" title="">
										<% end_if %>
									</picture>
								</div>
							</div>
							<div class="h-100 d-flex flex-column p-4 p-xxl-5">
								<div class="flex-grow-1">
									<div class="d-flex flex-wrap gap-1 mb-4">
										<p class="fw-semibold text-green mb-0">$Type | $Duration Minutes</p>                                        
									</div>
									<p class="fs-5 fw-semibold lh-sm mb-4"><span class="underline-on-hover">$Title</span></p>
								</div>
								<p class="mb-1 lh-sm fw-semibold d-flex align-items-center bt">
									<span class="me-2">Start</span>
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
</section>