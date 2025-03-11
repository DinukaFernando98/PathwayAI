<% if $Form %>
	<div>
		<div class="login-page">
			<div class="login-page__wrap">
				<h1 class="mb-5">$Title</h1>
			<div class="typo">
				<p>$Content</p>
			</div>
			$Form
			</div>
		</div>
	</div>
<% else %>

	<% include Hero %>
	
	<% loop Blocks.Sort('SortOrder', 'ASC') %>
		$forTemplate
	<% end_loop %>

<% end_if %>