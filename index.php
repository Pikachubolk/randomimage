<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Randomizer - Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        #random-image {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 20px auto;
        }

        .refresh-button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .refresh-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Image Randomizer - Documentation</h1>
    <p>
        This page demonstrates various use cases of the Image Randomizer software. Below, you can see a randomly
        selected image from the available categories or the entire image collection.
    </p>

    <?php
    // PHP script to display the random image
    $randomImageURL = '/image'; // Replace with your server URL
    ?>

    <img id="random-image" src="<?php echo $randomImageURL; ?>" alt="Random Image">

    <button class="refresh-button" onclick="refreshImage()">Refresh Image</button>

    <script>
        function refreshImage() {
            // Reload the image by adding a random query parameter to bypass the cache
            document.getElementById('random-image').src = '<?php echo $randomImageURL; ?>?' + Date.now();
        }
    </script>

    <h2>Use Cases</h2>
    <ul>
        <li>
            To get a random image from any category, simply access the URL: <code>https://website.com/image</code>
        </li>
        <li>
            To get a random image from a specific category (e.g., "cats"), use the URL:
            <code>https://website.com/image?c=cats</code>
        </li>
        <li>
            To get an image with a specific width (e.g., 300 pixels), use the URL:
            <code>https://website.com/image?w=300</code>
        </li>
        <li>
            To get an image with a specific height (e.g., 200 pixels), use the URL:
            <code>https://website.com/image?h=200</code>
        </li>
        <li>
            To get an image with both specific width and height (e.g., 400x300 pixels) from a specific category
            (e.g., "cats"), use the URL: <code>https://website.com/image?c=cats&w=400&h=300</code>
        </li>
    </ul>
</body>
</html>
