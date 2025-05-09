<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image converter</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>choose images (max. 20):</label>
    <input type="file" name="images[]" multiple accept="image/*" required><br><br>
    <label>Quality (0-100):</label>
    <input type="number" name="quality" min="0" max="100" value="80"><br>
    <label>width (px):</label>
    <input type="number" name="width"><br>
    <label>height (px):</label>
    <input type="number" name="height"><br><br>
    <button type="submit">Convert</button>
</form>

</body>
</html>