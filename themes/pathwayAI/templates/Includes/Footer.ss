<footer class="footer-wrapper">
    <div class="container">
        <div class="footer">
			<div class="logo">
				<h1 class="mb-4">Logo</h1>
				<p class="mb-8">A short snippet of text below the logo.</p>
			</div>
            <div class="footer-blocks">
                <% if $getMainNavigation %>
                    <div class="footer-block">
                        <h2 class="footer-block__heading">Heading</h2>
                        <nav>
                            <ul>
                                <% loop $getMainNavigation %>
                                    <li class="footer-block__item">
                                        <a href="$Link" class="footer-block__link">
                                            $Title
                                        </a>
                                    </li>
                                <% end_loop %>
                            </ul>
                        </nav>
                    </div>
                <% end_if %>
                <% if $getMainNavigation %>
                    <div class="footer-block">
                        <h2 class="footer-block__heading">Heading</h2>
                        <nav>
                            <ul>
                                <% loop $getMainNavigation %>
                                    <li class="footer-block__item">
                                        <a href="$Link" class="footer-block__link">
                                            $Title
                                        </a>
                                    </li>
                                <% end_loop %>
                            </ul>
                        </nav>
                    </div>
                <% end_if %>
                <% if $getMainNavigation %>
                    <div class="footer-block">
                        <h2 class="footer-block__heading">Heading</h2>
                        <nav>
                            <ul>
                                <% loop $getMainNavigation %>
                                    <li class="footer-block__item">
                                        <a href="$Link" class="footer-block__link">
                                            $Title
                                        </a>
                                    </li>
                                <% end_loop %>
                            </ul>
                        </nav>
                    </div>
                <% end_if %>
				<% if $getMainNavigation %>
					<div class="footer-block">
						<h2 class="footer-block__heading">Heading</h2>
						<nav>
							<ul>
								<% loop $getMainNavigation %>
									<li class="footer-block__item">
										<a href="$Link" class="footer-block__link">
											$Title
										</a>
									</li>
								<% end_loop %>
							</ul>
						</nav>
					</div>
				<% end_if %>
            </div>
			<div class="footer-sidebar">

			</div>
        </div>
        <div class="copyright">
            <section class="copyright__left">
                &copy; $Now.Year - PathwayAI. All rights reserved.
            </section>
            <section class="copyright__right">
                Website Design and Development by TSD Group 5
            </section>
        </div>
    </div>
</footer>
