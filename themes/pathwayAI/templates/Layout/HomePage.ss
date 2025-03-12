<% include Hero %>

<% loop Blocks.Sort('SortOrder', 'ASC') %>
	$forTemplate
<% end_loop %>