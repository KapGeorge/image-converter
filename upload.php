<?php
function convertToWebP($sourcePath, $destinationPath, $quality = 80, $newWidth = null, $newHeight = null) {
    $info = getimagesize($sourcePath);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($sourcePath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($sourcePath);
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($sourcePath);
            break;
        default:
            return false;
    }

    if ($newWidth || $newHeight) {
        $originalWidth = imagesx($image);
        $originalHeight = imagesy($image);

        if (!$newWidth) {
            $newWidth = intval($originalWidth * ($newHeight / $originalHeight));
        } elseif (!$newHeight) {
            $newHeight = intval($originalHeight * ($newWidth / $originalWidth));
        }

        $resized = imagecreatetruecolor($newWidth, $newHeight);
        imagealphablending($resized, false);
        imagesavealpha($resized, true);

        imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
        $image = $resized;
    }

    imagewebp($image, $destinationPath, $quality);
    imagedestroy($image);
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quality = isset($_POST['quality']) ? intval($_POST['quality']) : 80;
    $width = isset($_POST['width']) ? intval($_POST['width']) : null;
    $height = isset($_POST['height']) ? intval($_POST['height']) : null;

    $files = $_FILES['images'];

    if (count($files['name']) > 20) {
        echo "❌ Max 20 files.";
        exit;
    }

    $outputDir = __DIR__ . '/converted';
    if (!file_exists($outputDir)) mkdir($outputDir);

    foreach ($files['name'] as $i => $name) {
        $tmpName = $files['tmp_name'][$i];
        $baseName = pathinfo($name, PATHINFO_FILENAME);
        $webpPath = $outputDir . '/' . $baseName . '.webp';

        if (convertToWebP($tmpName, $webpPath, $quality, $width, $height)) {
            echo "✅ $name ➝ $baseName.webp<br>";
        } else {
            echo "❌ Error $name<br>";
        }
    }
}
?>
