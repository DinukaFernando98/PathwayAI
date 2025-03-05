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

    <style>
        body [data-barba="wrapper"]{
            opacity: 0;
            transition: opacity 0.4s 0s
        }
        body.website-loaded [data-barba="wrapper"]{
            opacity: 1
        }
    </style>

    <link rel="stylesheet" href="https://use.typekit.net/jrj7ops.css">
    <link rel="stylesheet" type="text/css" href="/_resources/themes/pathwayAI/css/bootstrap.css" />

</head>

<body class="$ClassName no-transition">

<% include Header %>

<main id="main">
    $Layout
</main>

<% include Footer %>

<script type="application/javascript" src="/_resources/themes/pathwayAI/js/all.js?m=1741197679"></script>
<script type="module" src="/_resources/themes/pathwayAI/js/main.js?m=1738839422"></script>

</body>
</html>