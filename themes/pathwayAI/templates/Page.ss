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
    <link rel="stylesheet" type="text/css" href="$ThemeDir/css/bootstrap.css" />

</head>

<body>

<div data-barba="wrapper">

    <% include Nav %>

    <main class="min-vh-100" data-barba="container" data-barba-namespace="">
        <div class="transition-layer"></div>
        $Layout
    </main>

    <% include Footer %>

</div>

<script type="application/javascript" src="$ThemeDir/js/all.js"></script>
<script type="module" src="$ThemeDir/js/main.js"></script>

</body>
</html>