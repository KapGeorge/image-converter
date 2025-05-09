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
    <link rel="stylesheet" id="simple-styles" href="/assets/style.css" media="all">
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

<body class="min-h-screen flex items-center justify-center text-white">

  <div class="glass p-10 rounded-2xl shadow-2xl w-full max-w-lg animate-fadeIn">
    <h1 class="text-3xl font-bold text-center mb-6">Convert Images to WebP</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data" class="space-y-5">
      <div>
        <label class="block mb-1 font-semibold">Select up to 20 images:</label>
        <input type="file" name="images[]" multiple accept="image/*" required class="w-full p-2 rounded-lg">
      </div>

      <div>
        <label class="block mb-1 font-semibold">Quality (0–100):</label>
        <input type="number" name="quality" min="0" max="100" value="100" class="w-full p-2 rounded-lg">
      </div>

      <div>
        <label class="block mb-1 font-semibold">Resize Width (px):</label>
        <input type="number" name="width" class="w-full p-2 rounded-lg">
      </div>

      <div>
        <label class="block mb-1 font-semibold">Resize Height (px):</label>
        <input type="number" name="height" class="w-full p-2 rounded-lg">
      </div>

      <button type="submit"
              class="w-full py-3 mt-4 rounded-lg bg-blue-600 hover:bg-blue-700 transition duration-300 ease-in-out font-semibold text-lg shadow-md hover:scale-105 transform">
        Convert to WebP
      </button>
    </form>
  </div>

  <script>
    // Simple fade in animation on load
    document.querySelector('.animate-fadeIn')?.classList.add('opacity-0');
    window.addEventListener('load', () => {
      const el = document.querySelector('.animate-fadeIn');
      el.classList.remove('opacity-0');
      el.classList.add('transition-opacity', 'duration-1000', 'opacity-100');
    });
  </script>
</html>