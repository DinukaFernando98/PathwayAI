<% if $getTabs %>
	<div class="element__inner bg-gray-100 jsTabs" id="tabs">
		<div class="container md:max-w-screen-md">
			<header class="text-center mb-12">
				<% if $ShowTitle %>
					<h2 class="font-bold mb-4">
						$Title
					</h2>
				<% end_if %>
				<div class="-mx-4">
					<ul class="flex flex-wrap items-center justify-center">
						<% loop $getTabs %>
							<li class="mx-4 my-2">
								<button class="tabs__trigger<% if $First %> is-active<% end_if %> tabsTrigger"
										id="tab-$Pos"
										data-tab="tab-section-$Pos"
										aria-selected="<% if $First %>true<% else %>false<% end_if %>">
									Tab 1
								</button>
							</li>
						<% end_loop %>
					</ul>
				</div>
			</header>
			<ul>
				<% loop $getTabs %>
					<li class="tabs__content<% if not $First %> hidden<% end_if %> tabsContent"
						id="tab-section-$Pos"
						aria-hidden="<% if $First %>false<% else %>true<% end_if %>"
						aria-labelledby="tab-$Pos">
						<article class="typo">
							$Content
						</article>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
<% end_if %>
