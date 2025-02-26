<header class="header-wrapper">
    <div class="container">
        <div class="header header--1">
            <a href="/" class="logo">
                <h1>Logo</h1>
            </a>
            <button class="nav-btn" id="navBtn" aria-label="Menu">
				<% include BaseIcons Icon=Menu %>
				<% include BaseIcons Icon=Close %>
                <span class="nav-btn__text"></span>
            </button>
			<% include Nav %>
			<aside class="header-sidebar" id="headerSidebar">
				<a href="/" class="button button--alt w-full md:w-auto">
					Call to Action
				</a>
			</aside>
        </div>
    </div>
</header>
