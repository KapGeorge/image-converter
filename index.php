<?php
$domain = htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Image Converter</title>
    <meta name="description" content="Convert image from any format to WebP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://<?= $domain ?>/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Image Converter">
    <meta property="og:description" content="Convert image from any format to WebP">
    <meta property="og:url" content="https://<?= $domain ?>/">
    <meta property="og:site_name" content="Image Converter">
    <meta property="og:image" content="assets/images/webp_converter_logo.png">
    <meta property="og:image:secure_url" content="https://<?= $domain ?>/assets/images/webp_converter_logo.png">
    <meta property="og:image:width" content="146">
    <meta property="og:image:height" content="52">
    <meta property="og:image:type" content="image/png">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <h1>Convert Images to WebP</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select up to 20 images:</label><br>
        <input type="file" name="images[]" multiple accept="image/*" required><br><br>

        <label>Quality (0–100):</label><br>
        <input type="number" name="quality" min="0" max="100" value="100"><br><br>

        <label>Resize Width (px):</label><br>
        <input type="number" name="width"><br><br>

        <label>Resize Height (px):</label><br>
        <input type="number" name="height"><br><br>

        <button type="submit">Convert to WebP</button>
    </form>
</body>

</html>