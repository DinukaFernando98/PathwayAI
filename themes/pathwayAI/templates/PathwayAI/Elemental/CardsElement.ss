<% if $getCards %>
	<div class="element__inner bg-gray-100">
		<div class="container">
			<% if $ShowTitle %>
				<header class="text-center mb-12">
					<h2 class="font-bold">
						$Title
					</h2>
				</header>
			<% end_if %>
			<ul class="grid grid-cols-1 gap-8
					   md:grid-cols-3">
				<% loop $getCards %>
					<li class="flex">
						<% if $Button %>
							<a href="$Button.LinkURL" $Button.TargetAttr>
								<% include Card %>
							</a>
						<% else %>
							<% include Card %>
						<% end_if %>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
<% end_if %>
