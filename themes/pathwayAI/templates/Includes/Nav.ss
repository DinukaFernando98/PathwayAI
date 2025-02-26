<%--
# Nav Types

To use - e.g.
<% include Nav Type='slide-in' %>

## Keep these alphabetical so they are easier to manage
- Default (leave Type variable blank to use)
- Slide-In
--%>

<% if $getMainNavigation %>
	<nav class="nav"
		 id="nav"
		 data-type="$Type.LowerCase">
		<ul class="nav-list">
			<% loop $getMainNavigation %>
				<li class="nav-list__item">
					<a href="$Link" class="nav-list__link">
						$Title
					</a>
				</li>
			<% end_loop %>
		</ul>
	</nav>
<% end_if %>
