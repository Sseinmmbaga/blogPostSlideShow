<?php
// get_slideshow_image.php

require 'database.php';

$query = $db->query('SELECT Image_Path FROM Posts LIMIT 1');
$imageUrls = $query->fetchAll(PDO::FETCH_COLUMN);

header('Content-Type: application/json');
echo json_encode($imageUrls);
?>
