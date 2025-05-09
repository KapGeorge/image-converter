<?php
function convertToWebP($sourcePath, $destinationPath, $quality = 100, $newWidth = null, $newHeight = null) {
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

function rrmdir($dir) {
    foreach (glob($dir . '/*') as $file) {
        is_dir($file) ? rrmdir($file) : unlink($file);
    }
    rmdir($dir);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quality = isset($_POST['quality']) ? intval($_POST['quality']) : 80;
    $width = isset($_POST['width']) ? intval($_POST['width']) : null;
    $height = isset($_POST['height']) ? intval($_POST['height']) : null;

    $files = $_FILES['images'];

    if (count($files['name']) > 160) {
        echo "❌ Maximum 20 images allowed.";
        exit;
    }

    $outputDir = __DIR__ . '/converted_' . time();
    mkdir($outputDir);

    $webpFiles = [];

    foreach ($files['name'] as $i => $name) {
        $tmpName = $files['tmp_name'][$i];
        $baseName = pathinfo($name, PATHINFO_FILENAME);
        $webpPath = "$outputDir/$baseName.webp";

        if (convertToWebP($tmpName, $webpPath, $quality, $width, $height)) {
            $webpFiles[] = $webpPath;
        }
    }

    if (count($webpFiles) === 0) {
        echo "❌ No images were converted.";
        rrmdir($outputDir);
        exit;
    }

    // Create ZIP
    $zipName = "webp_images_" . time() . ".zip";
    $zipPath = __DIR__ . '/' . $zipName;

    $zip = new ZipArchive();
    if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
        foreach ($webpFiles as $file) {
            $zip->addFile($file, basename($file));
        }
        $zip->close();
    } else {
        echo "❌ Failed to create ZIP archive.";
        rrmdir($outputDir);
        exit;
    }

    // Cleanup temp WebP files
    rrmdir($outputDir);

    // Serve the ZIP file and delete it after download
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zipPath) . '"');
    header('Content-Length: ' . filesize($zipPath));
    readfile($zipPath);
    unlink($zipPath); // Auto-delete ZIP after download
    exit;
}
?>
