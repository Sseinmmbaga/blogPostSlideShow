// scripts.js
$(document).ready(function() {
    // Fetch blog posts
    fetchPosts();

    // Fetch slideshow image
    fetchSlideshowImage();

    // Create post form submission
    $('#create-post-form').submit(function(e) {
        e.preventDefault();
        const form = $(this);
        const title = form.find('input[name="title"]').val();
        const content = form.find('textarea[name="content"]').val();
        const imageUrl = form.find('input[name="imageUrl"]').val();

        createPost(title, content, imageUrl);
        form.trigger('reset');
    });
});

function fetchPosts() {
    $.ajax({
        url: 'get_posts.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            const blogPosts = document.getElementById('blog-posts');

            data.forEach(post => {
                const postElement = document.createElement('div');
                postElement.classList.add('post');

                const titleElement = document.createElement('h2');
                titleElement.textContent = post.title;

                const contentElement = document.createElement('p');
                contentElement.textContent = post.content;

                postElement.appendChild(titleElement);
                postElement.appendChild(contentElement);

                blogPosts.appendChild(postElement);
            });
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function fetchSlideshowImage() {
    $.ajax({
        url: 'get_slideshow_image.php',
        type: 'GET',
        success: function(data) {
            const slideshowImage = document.getElementById('slideshow-image');
            let currentIndex = 0;

            function updateSlideshowImage() {
                slideshowImage.src = data[currentIndex];
                currentIndex = (currentIndex + 1) % data.length;
                setTimeout(updateSlideshowImage, 3000); // Change image every 3 seconds
            }

            updateSlideshowImage();
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function createPost(title, content, imageUrl) {
    $.ajax({
        url: 'create_post.php',
        type: 'POST',
        data: {
            title: title,
            content: content,
            imageUrl: imageUrl
        },
        success: function(response) {
            // Refresh blog posts
            fetchPosts();
        },
        error: function(error) {
            console.error(error);
        }
    });
}
