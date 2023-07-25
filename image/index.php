<?php
// Define the path to the pics directory
$picsDirectory = '../pics/';

// Check if a category parameter is provided in the URL
if (isset($_GET['c']) && !empty($_GET['c'])) {
    $category = $_GET['c'];
    $categoryDirectory = $picsDirectory . $category . '/';

    // Check if the category directory exists
    if (!file_exists($categoryDirectory) || !is_dir($categoryDirectory)) {
        header('HTTP/1.1 404 Not Found');
        echo 'Category not found';
        exit();
    }

    // Get a list of images in the specified category directory
    $images = glob($categoryDirectory . '*.{png,jpg,jpeg,gif}', GLOB_BRACE);
} else {
    // Get a list of all images in the pics directory (including subdirectories)
    $images = glob($picsDirectory . '**/*.{png,jpg,jpeg,gif}', GLOB_BRACE);
}

// Check if the width or height parameters are specified
$width = isset($_GET['w']) ? intval($_GET['w']) : null;
$height = isset($_GET['h']) ? intval($_GET['h']) : null;

// Filter images by width or height if parameters are provided
if ($width || $height) {
    $filteredImages = [];
    foreach ($images as $image) {
        list($imageWidth, $imageHeight) = getimagesize($image);
        if ((!$width || $imageWidth == $width) && (!$height || $imageHeight == $height)) {
            $filteredImages[] = $image;
        }
    }
    $images = $filteredImages;
}

// Check if there are any images available
if (empty($images)) {
    header('HTTP/1.1 404 Not Found');
    echo 'No images found';
    exit();
}

// Select a random image from the available images
$randomImage = $images[array_rand($images)];

// Set the appropriate Content-Type header for the image
$imageFileType = strtolower(pathinfo($randomImage, PATHINFO_EXTENSION));
switch ($imageFileType) {
    case 'png':
        header('Content-Type: image/png');
        break;
    case 'jpg':
    case 'jpeg':
        header('Content-Type: image/jpeg');
        break;
    case 'gif':
        header('Content-Type: image/gif');
        break;
    default:
        header('HTTP/1.1 500 Internal Server Error');
        echo 'Invalid image type';
        exit();
}

// Output the selected image
readfile($randomImage);
?>
