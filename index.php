<?php
// Šis fails ir, lai izvadītu datus no datubāzes uz
// lapu 
require "functions.php";
require "Database.php";

$config = require("config.php");

$query = "SELECT * FROM posts";
$params = [];

if (isset($_GET["category"]) && $_GET["category"] != "") {
  $category = $_GET["category"];
  $query .= " JOIN categories
              ON posts.category_id = categories.id
              WHERE categories.name = :category
            ";
  $params[":category"] = $category;
}

if (isset($_GET["id"]) && $_GET["id"] != "") {
  $id = $_GET["id"];
  $query .= " WHERE id=:id";
  $params[":id"] = $id;
}

$db = new Database($config);
$posts = $db
          ->execute($query, $params)
          ->fetchAll();


echo "<form>";
echo "<input name='id'/>";
echo "<button>Filter by ID</button>";
echo "</form>";

echo "<form>";
echo "<input name='category'/>";
echo "<button>Filter by category</button>";
echo "</form>";

echo "<h1>Posts</h1>";

echo "<ul>";
foreach($posts as $post) {
  echo "<li>" . $post["title"] . "</li>";
}
echo "</ul>";
