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
        <section class="pt-5">
            <% if JobPrediction.Error %>
                <p class="error">Error: $JobPrediction.Error</p>
            <% else %>
                <h2>Job market trends for: <strong>$JobPrediction.JobTitle</strong></h2>
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

        <section class="pt-5 text-center">
            <h2>My Career <strong>Pathway</strong></h2>
            <% if $careerPathDataList %>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <% loop $careerPathDataList %>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <p class="card-text text-center">$CareerStep</p>
                                    </div>
                                </div>
                                <% if not $Last %>
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
        </section>

        <section class="pt-5 text-center">
            <h2><strong>Career Tips</strong></h2>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-start">
                        <p>Whether you're just starting out or looking to advance in your profession, these career tips can help guide your journey:</p>
        
                        <h5><strong>1. Keep Learning</strong></h5>
                        <p>Stay updated with industry trends and continuously upgrade your skills through courses, certifications, and training programs.</p>
                        <ul>
                            <li>Take online courses related to your field.</li>
                            <li>Attend workshops and seminars.</li>
                            <li>Read industry blogs and publications.</li>
                        </ul>
        
                        <h5><strong>2. Build a Professional Network</strong></h5>
                        <p>Networking can open doors to new opportunities, mentorships, and collaborations.</p>
                        <ul>
                            <li>Join industry groups on LinkedIn.</li>
                            <li>Participate in job fairs and conferences.</li>
                            <li>Connect with alumni from your university.</li>
                        </ul>
        
                        <h5><strong>3. Customize Your Resume and Cover Letter</strong></h5>
                        <p>Tailor your application documents for each job to highlight the most relevant skills and experiences.</p>
                        <ul>
                            <li>Use keywords from the job description.</li>
                            <li>Showcase measurable achievements.</li>
                            <li>Keep it concise and well-structured.</li>
                        </ul>
        
                        <h5><strong>4. Set Clear Career Goals</strong></h5>
                        <p>Having a vision for your career path helps you stay focused and make informed decisions.</p>
                        <ul>
                            <li>Define short-term and long-term goals.</li>
                            <li>Review and adjust your goals regularly.</li>
                            <li>Track your progress and milestones.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-5 text-center">
            <h2>Prepping for <strong>interviews</strong></h2>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-start">
                        <p>Preparing for interviews is key to making a great impression and increasing your chances of getting hired. Here are some tips to help you perform your best:</p>
        
                        <h5><strong>1. Research the Company</strong></h5>
                        <p>Understand the company’s mission, values, recent news, and the role you're applying for.</p>
                        <ul>
                            <li>Visit their official website and LinkedIn page.</li>
                            <li>Read recent press releases or blog posts.</li>
                            <li>Understand their products, services, and culture.</li>
                        </ul>
        
                        <h5><strong>2. Practice Common Interview Questions</strong></h5>
                        <p>Be ready to answer both general and role-specific questions clearly and confidently.</p>
                        <ul>
                            <li>Tell me about yourself.</li>
                            <li>What are your strengths and weaknesses?</li>
                            <li>Why do you want to work here?</li>
                        </ul>
        
                        <h5><strong>3. Dress Professionally</strong></h5>
                        <p>First impressions count. Dress according to the company culture, leaning towards formal if unsure.</p>
                        <ul>
                            <li>Clean and well-fitted clothing.</li>
                            <li>Neat grooming and minimal accessories.</li>
                            <li>Check the company's social media for dress code hints.</li>
                        </ul>
        
                        <h5><strong>4. Ask Insightful Questions</strong></h5>
                        <p>Asking thoughtful questions shows you're genuinely interested in the role and organization.</p>
                        <ul>
                            <li>Can you tell me more about the team I’d be working with?</li>
                            <li>What are the biggest challenges in this role?</li>
                            <li>What are the next steps in the hiring process?</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <%-- <section class="career-pathway">
            <% if $LinkedInJobsList %>
                <h3>More Job Listings (LinkedIn)</h3>
                <% loop $LinkedInJobsList %>
                    <div>
                        <img src="$organization_logo">
                        <h4>$title</h4>
                        <p>Company: $organization</p>
                        <p>Location: $location</p>
                        <p>Posted: $date_posted</p>
                        <p><a href="$url" target="_blank">View Job</a></p>
                    </div>
                <% end_loop %>
            <% else %>
                <p>No additional jobs found.</p>
            <% end_if %>
        </section> --%>
        
	</div>
</section>