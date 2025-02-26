<% if $getAccordions %>
	<div class="element__inner bg-gray-100">
		<div class="container md:max-w-screen-md">
			<% if $ShowTitle %>
				<header class="mb-8">
					<h2 class="font-bold mb-4">
						$Title
					</h2>
				</header>
			<% end_if %>
			<ul>
				<% loop $getAccordions %>
					<li class="my-4">
						<details class="accordion__item"<% if $First %> open=""<% end_if %>>
							<summary class="accordion__title">
								$Title
							</summary>
							<div class="accordion__content">
								$Content
							</div>
						</details>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
<% end_if %>
