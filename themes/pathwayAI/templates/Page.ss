<!DOCTYPE html>
<html lang="$ContentLocale">
<head>
    <% base_tag %>
    <!--Generate Meta Tags Start -->
    $GenerateMetaTags.RAW
    <!-- Generate Meta Tags End -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5">
    <meta name="referrer" content="unsafe-url">
    <meta name="referrer" content="always">
    <meta name="format-detection" content="telephone=no">

    <% include Favicon %>
</head>

<body class="$ClassName no-transition">

<a class="a11y-btn" href="#main">
	Skip to main content
</a>

<% include Header %>

<main id="main">
    $Layout
</main>

<% include PhotoSwipeModal %>
<% include Footer %>

</body>
</html>
