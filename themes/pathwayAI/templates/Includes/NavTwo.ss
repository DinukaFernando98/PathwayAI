<%--
# Nav Types

To use - e.g.
<% include Nav Type='slide-in' %>

## Keep these alphabetical so they are easier to manage
- Default (leave Type variable blank to use)
- Slide-In
--%>

<% if $getMainNavigation.Limit(6) %>
	<nav class="nav nav--2"
		 id="nav"
		 data-type="$Type.LowerCase">
		<ul class="nav-list">
			<% loop $getMainNavigation %>
				<% if $Pos == '3' %>
					<li class="nav-list__item">
						<a href="$Link" class="nav-list__link">
							$Title
						</a>
					</li>
					<li class="nav-list__item logo" aria-hidden="true">
						<a href="/" class="nav-list__link">
							<h1>Logo</h1>
						</a>
					</li>
				<% else %>
					<li class="nav-list__item">
						<a href="$Link" class="nav-list__link">
							$Title
						</a>
					</li>
				<% end_if %>
			<% end_loop %>
		</ul>
	</nav>
<% end_if %>
