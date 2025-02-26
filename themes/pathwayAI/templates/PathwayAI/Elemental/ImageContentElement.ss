<div class="overflow-hidden">
	<div class="container">
		<div class="grid gap-12 grid-cols-1
					md:gap-24 md:grid-cols-2">
			<article class="relative flex flex-col items-start justify-center w-full
						<% if $Swap %> order-2<% else %> order-2 md:order-1<% end_if %>">
				<% if $Title %>
					<h2 class="font-bold mb-2">
						$Title
					</h2>
				<% end_if %>
				<% if $Subtitle %>
					<h3 class="h5 font-bold">
						$Subtitle
					</h3>
				<% end_if %>
				<% if $Content %>
					<div class="typo mt-4">
						$Content
					</div>
				<% end_if %>
				<% if $Button %>
					<a class="button button--clear<% if $Button.TargetAttr %> button--new-tab<% end_if %> mt-8"
					   href="$Button.LinkURL"
						$Button.TargetAttr>
						$Button.Title
					</a>
				<% end_if %>
			</article>
			<aside class="w-full
					  	  <% if $Swap %> order-1 slideInLeft<% else %> order-1 md:order-2 slideInRight<% end_if %>">
				<% if $Image %>
					<picture>
						<source srcset="$Image.Fill(1000, 1000).URL"
								media="(min-width: 767px)">
						<img class="w-full"
							 src="$Image.Fill(600,400).URL"
							 alt="$Image.Alt"
							 loading="lazy"
							 width="600"
							 height="400">
					</picture>
				<% end_if %>
			</aside>
		</div>
	</div>
</div>

