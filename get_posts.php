<?php
// get_posts.php

require 'database.php';

$posts = getPosts();

header('Content-Type: application/json');
echo json_encode($posts);
?>
