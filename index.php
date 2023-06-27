<!-- index.html -->
<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>My Blog</h1>

    <form id="create-post-form">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <input type="file" name="imageUrl" placeholder="Image URL">
        <button type="submit">Create Post</button>
    </form>

    <div class="slideshow">
        <img src="" alt="Slideshow Image" id="slideshow-image">
    </div>

    <div id="blog-posts"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
