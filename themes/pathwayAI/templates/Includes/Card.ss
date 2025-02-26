<div class="w-full flex flex-col items-start rounded shadow overflow-hidden bg-white">
	<% if $Image %>
		<img class="w-full slideInBottomStagger"
			 src="$Image.Fill(600,400).URL"
			 alt="$Image.Alt"
			 loading="lazy"
			 width="600"
			 height="400">
	<% end_if %>
	<div class="w-full flex flex-col items-start p-8">
		<h3 class="h4 font-bold">
			$Title
		</h3>
		<% if $Content %>
			<p class="mt-4">
				$Content
			</p>
		<% end_if %>
		<% if $Button %>
			<span class="button mt-8">
				$Button.Title
			</span>
		<% end_if %>
	</div>
</div>
