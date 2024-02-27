<?php

require "functions.php";

echo "Hi <br>";

$connection_string = "mysql:host=localhost;dbname=blog_IPb22;user=root;password=root;charset=utf8mb4";
$pdo = new PDO($connection_string);

// 1. Sagatavot SQL izpildei
$query = $pdo->prepare("SELECT * FROM posts");

// 2. Izpilīt SQL
$query->execute();
// 3. Beidzot dabūt rezultātus, visus pie tam!
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
foreach($posts as $post) {
  echo "<li>" . $post["title"] . "</li>";
}
echo "</ul>";


