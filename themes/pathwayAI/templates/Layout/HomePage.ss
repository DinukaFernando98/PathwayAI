<% include Hero %>

$ElementalArea
	
<% loop Blocks.Sort('SortOrder', 'ASC') %>
	$forTemplate
<% end_loop %>