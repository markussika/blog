<?php
// Šis fails ir, lai izvadītu datus no datubāzes uz
// lapu 
require "functions.php";
require "Database.php";

$config = require("config.php");

$db = new Database($config);
$posts = $db
          ->execute("SELECT * FROM posts")
          ->fetchAll();

echo "<ul>";
foreach($posts as $post) {
  echo "<li>" . $post["title"] . "</li>";
}
echo "</ul>";


