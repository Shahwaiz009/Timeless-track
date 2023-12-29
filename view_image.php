<?php
// view_image.php

if (isset($_GET['image'])) {
    $imageName = $_GET['image'];
    $imagePath = 'uploaded_img/' . $imageName;

    // Debugging: Check if the file exists
    if (file_exists($imagePath)) {
    
        // Output the image in full screen
        echo '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>View Image</title>
                </head>
                <body style="margin: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
                    <img src="' . $imagePath . '" style="max-width: 100%; max-height: 100%;" alt="Full Screen Image">
                </body>
                </html>';
    } else {
        echo 'Image File Not Found: ' . $imagePath;
    }
} else {
    echo 'Image not found.';
}
?>
