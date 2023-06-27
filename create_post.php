<?php
// create_post.php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['Category'];
    $content = $_POST['Author'];
    $imageUrl = $_POST['Image_Path'];

    createPost($title, $content, $imageUrl);
}
?>
