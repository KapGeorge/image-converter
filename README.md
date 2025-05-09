WebP Image Converter
This project allows users to convert multiple images into WebP format with optional resizing and quality adjustments. The images can be processed in batches of up to 20 files at a time, ensuring that the server can handle large numbers of files efficiently.

Features
Batch processing: Upload up to 160 images, processed in batches of 20.

Resizing: Resize images by specifying width or height.

Quality: Adjust image quality (0-100).

ZIP archive: After processing, download all converted WebP files in a ZIP archive.

Requirements
PHP 7.3 or higher

The GD library enabled in PHP (for image processing)

A server capable of handling multiple file uploads

Enough disk space to store temporary and final ZIP files

Installation
Download or Clone the Repository

Upload to Your Hosting

Upload all the files to your hosting server.

Ensure that the temp_sessions/ directory is created and writable (set chmod 777 on this directory).

Configure PHP (optional)

If needed, modify your php.ini file to allow large file uploads and sufficient memory:

 
upload_max_filesize = 256M
post_max_size = 256M
max_file_uploads = 200
memory_limit = 512M
max_execution_time = 120
Restart your web server after changing php.ini.

Ensure GD Library is Installed

If you're using PHP 7.3 or higher, GD should be available by default. If not, you can enable it via your hosting control panel or php.ini file.

To check if GD is enabled:

 
<?php phpinfo(); ?>
Look for the "GD" section. If it’s missing, you’ll need to install and enable it.

Usage
1. Access the Converter Interface
Open your browser and go to your hosted page (index.php). You'll be presented with a form where you can:

Select up to 160 images.

Choose the quality for conversion (0-100).

Optionally, specify the width or height for resizing.

2. Select Files
Select the files you want to convert. A maximum of 160 files can be selected at once, but they will be processed in batches of 20 files.

3. Start Conversion
Press the "Convert" button. The process will begin, and the selected files will be uploaded in batches of 20. During this process, a progress bar will show the upload status.

4. Download ZIP
Once all the images are converted, you will receive a link to download a ZIP file containing all the WebP images.

5. Handle Errors
If an error occurs (e.g., invalid file format, server overload), the form will show a relevant error message