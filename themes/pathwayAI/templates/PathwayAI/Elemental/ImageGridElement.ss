<% if $getImageGridItems %>
	<div class="container">
		<% if $ShowTitle %>
			<header class="mb-8 text-center">
				<h2 class="font-bold mb-4">
					$Title
				</h2>
			</header>
		<% end_if %>
		<ul class="grid gap-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-6<% if $IsGallery %> jsGallery<% end_if %>"
			itemscope itemtype="http://schema.org/ImageGallery">
			<% loop $getImageGridItems %>
				<li class="my-4">
					<figure itemprop="associatedMedia"
							itemscope itemtype="http://schema.org/ImageObject">
						<% if $Top.IsGallery %>
							<a class="block galleryItem"
							   href="$Image.URL"
							   itemprop="contentUrl"
								<%-- height and width of image --%>
							   data-height="$Image.Height"
							   data-width="$Image.Width"
								<%-- pos starts at zero --%>
							   data-pos="$Pos"
							   data-title="$Title"
							   data-caption="$Caption">
								<img class="w-full slideInBottomStagger"
									 src="$Image.Fill(400, 400).URL"
									 itemprop="thumbnail"
									 loading="lazy"
									 height="400"
									 width="400"
									 alt="$Image.Alt" />
							</a>
						<% else %>
							<img class="w-full slideInBottomStagger"
								 src="$Image.Fill(400,400).URL"
								 loading="lazy"
								 height="400"
								 width="400"
								 alt="$Image.Alt">
						<% end_if %>
					</figure>
				</li>
			<% end_loop %>
		</ul>
	</div>
<% end_if %>
