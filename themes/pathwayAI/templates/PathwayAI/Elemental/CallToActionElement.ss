<div class="relative w-full bg-primary text-white">
	<% if $Image %>
		<picture class="relative block md:min-h-[50vh]<% if $FullHeight %> md:h-screen<% end_if %>">
			<source media="(max-width: 767px)"
					srcset="$Image.Fill(600,400).URL">
			<img class="w-full md:absolute md:object-cover md:h-full"
				 src="$Image.Fill(2500,600).URL"
				 alt="$Image.Alt"
				 loading="lazy"
				 width="2560"
				 height="600">
		</picture>
	<% end_if %>
	<section class="pt-12 pb-20
					md:p-12 md:absolute md:top-0 md:left-0 md:w-full md:h-full md:bg-primary/[.5]">
		<div class="container flex flex-col items-center justify-center h-full text-center
					md:max-w-screen-md">
			<h2 class="h1 font-bold mb-4">
				$Title
			</h2>
			<% if $Button %>
				<a class="button button--clear<% if $Button.TargetAttr %> button--new-tab<% end_if %> mt-8"
				   href="$Button.LinkURL"
					$Button.TargetAttr>
					$Button.Title
				</a>
			<% end_if %>
		</div>
	</section>
</div>
