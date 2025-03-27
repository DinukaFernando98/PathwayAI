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

    <!-- Add this in the <head> section of your HTML -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <style>
        body [data-barba="wrapper"]{
            opacity: 0;
            transition: opacity 0.4s 0s
        }
        body.website-loaded [data-barba="wrapper"]{
            opacity: 1
        }

        .arrow-container {
    text-align: center;
    margin-top: 30px;
}
.card {
    border: 1px solid #007bff;  /* Optional: Change border color */
    border-radius: 10px;
}
.card-body {
    padding: 15px;
}
    </style>

    <link rel="stylesheet" href="https://use.typekit.net/jrj7ops.css">
    <link rel="stylesheet" type="text/css" href="$ThemeDir/css/bootstrap.css" />

</head>

<body>

<div data-barba="wrapper">

    <% include Nav %>

    <main data-barba="container" data-barba-namespace="">
        <div class="transition-layer"></div>
        $Layout
    </main>

    <% include Footer %>

</div>

<script type="application/javascript" src="$ThemeDir/js/all.js"></script>
<script type="module" src="$ThemeDir/js/main.js"></script>

</body>
</html>