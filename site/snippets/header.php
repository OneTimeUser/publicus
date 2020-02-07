<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>

    <!doctype html>
    <html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

        <!-- The title tag we show the title of our site and the title of the current page -->
        <title>
            <?= $site->title() ?> |
                <?= $page->title() ?>
        </title>
        <meta name="description" content="PublicUs (pub-li-cus) is a canteen-style, neighborhood restaurant and coffeebar located in the Fremont East District of Downtown Las Vegas" />
        <meta name="keywords" content="coffee, events, food, market, artisans, downtown, Las Vegas" />
        <meta name="author" content="PublicUs" />
        <link rel="shortcut icon" href="favicon.ico">
        <?= css(['assets/css/index.css']) ?>
            <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
            <script>
                document.documentElement.className = "js";
                var supportsCssVars = function() {
                    var e, t = document.createElement("style");
                    return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e
                };
                supportsCssVars() || alert("Please view this in a modern browser that supports CSS Variables.");

            </script>

    </head>

    <body class="loading">

            
