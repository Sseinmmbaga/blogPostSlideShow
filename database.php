<?php
// database.php

$host = 'localhost';
$dbname = 'youthTech';
$username = 'ssein';
$password = 'S@hussein700';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function getPosts() {
    global $db;
    $query = $db->query('SELECT Image_path FROM Posts');
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function createPost($title, $content, $imageUrl) {
    global $db;
    $query = $db->prepare('INSERT INTO Posts (Category, Author, Image_path) VALUES (?, ?, ?)');
    $query->execute([$title, $content, $imageUrl]);
}
?>
