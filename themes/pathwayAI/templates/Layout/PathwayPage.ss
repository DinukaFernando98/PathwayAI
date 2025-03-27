<!-- Hero_Pathway -->
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
				<h2 class="h1 pb-xl-2" anim-chars="" text-split="">Discover my pathway, from expert-led workshops to exclusive job fairs. Your next big break starts here!</h2>
				<div class="d-inline-block" anim-fade=""> 
					<a href="#events" class="btn icon">
						<div class="button-fill"></div>
						<strong>
							<span data-hover="View my pathway">View my pathway</span>
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

<section class="pt-5" data-function="load-more">
	<div class="container">
		<section class="career-pathway">
            <h3>Your Career Pathway</h3>
            <p>Estimated salary for your role:</p>
            <% if $Parameters %>
                <h3>Search Parameters</h3>
                <ul>
                    <% if $Parameters.job_title %><li>Job Title: $Parameters.job_title</li><% end_if %>
                    <% if $Parameters.location %><li>Location: $Parameters.location</li><% end_if %>
                    <% if $Parameters.location_type %><li>Location Type: $Parameters.location_type</li><% end_if %>
                    <% if $Parameters.years_of_experience %><li>Years of Experience: $Parameters.years_of_experience</li><% end_if %>
                </ul>
            <% else %>
                <p>No search parameters found.</p>
            <% end_if %>
            
            <% if $CareerDataList %>
                <h3>Career Data</h3>
                <% loop $CareerDataList %>
                    <div>
                        <h4>$job_title</h4>
                        <p>Location: $location</p>
                        <p>Salary Range: $min_salary - $max_salary $salary_currency ($salary_period)</p>
                        <p>Median Salary: $median_salary</p>
                        <p>Base Salary: $median_base_salary</p>
                        <p>Additional Pay: $median_additional_pay</p>
                    </div>
                <% end_loop %>
            <% else %>
                <p>No career data available.</p>
            <% end_if %>


            <% if $LinkedInJobsList %>
                <h3>More Job Listings (LinkedIn)</h3>
                <% loop $LinkedInJobsList %>
                    <div>
                        <%-- <img src="$organization_logo"> --%>
                        <h4>$title</h4>
                        <p>Company: $organization</p>
                        <p>Location: $location</p>
                        <p>Posted: $date_posted</p>
                        <%-- <p>Employment Type: $employment_type</p>
                        <p>Posted: $date_posted</p> --%>
                        <p><a href="$url" target="_blank">View Job</a></p>
                    </div>
                <% end_loop %>
            <% else %>
                <p>No additional jobs found.</p>
            <% end_if %>


        </section>
    <section>

        <% if JobPrediction.Error %>
            <p class="error">Error: $JobPrediction.Error</p>
        <% else %>
            <h2>Predictions for: $JobPrediction.JobTitle</h2>
            <p><strong>Salary Range:</strong> $JobPrediction.SalaryRange</p>
            <p><strong>Experience Required:</strong> $JobPrediction.ExperienceRequired</p>
            <p><strong>Qualifications Required:</strong></p>
            <ul>
                <% loop JobPrediction.QualificationsRequired %>
                    <li>$Qualification</li>
                <% end_loop %>
            </ul>
        <% end_if %>
    </section>


        <% if $careerPathDataList %>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <% loop $careerPathDataList %>
                            <!-- Card for Career Step -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p class="card-text text-center">$CareerStep</p>
                                </div>
                            </div>
        
                            <!-- Add down directional arrow between steps -->
                            <% if $Last %>
                                <!-- No arrow after the last step -->
                            <% else %>
                                <div class="text-center mb-4">
                                    <i class="fas fa-arrow-down fa-3x"></i>
                                </div>
                            <% end_if %>
                        <% end_loop %>
                    </div>
                </div>
            </div>
        <% else %>
            <p>No career path available.</p>
        <% end_if %>
        
        
        
        


	</div>
</section>