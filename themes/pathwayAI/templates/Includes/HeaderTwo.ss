<header class="header-wrapper">
    <div class="container">
        <div class="header header--2">
            <a href="/" class="logo md:sr-only">
                <h1>Logo</h1>
            </a>
            <button class="nav-btn" id="navBtn" aria-label="Menu">
				<% include BaseIcons Icon=Menu %>
				<% include BaseIcons Icon=Close %>
                <span class="nav-btn__text"></span>
            </button>
			<% include NavTwo Type="slide-in" %>
			<aside class="header-sidebar" id="headerSidebar">
				<a href="/" class="button button--alt button--icon">
					<span class="sr-only">Shopping cart</span>
					<% include BaseIcons Icon=Cart %>
				</a>
			</aside>
        </div>
    </div>
</header>
