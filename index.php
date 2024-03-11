<?php
// Šis fails ir, lai izvadītu datus no datubāzes uz
// lapu 
require "functions.php";
require "Database.php";

$config = require("config.php");

$db = new Database($config);

$query = "SELECT * FROM posts";
$params = [];

if (isset($_GET["id"]) && $_GET["id"] != "") {
  $id = $_GET["id"];
  $query .= " WHERE id=:id";
  $params[":id"] = $id;
}

if (isset($_GET["category"]) && $_GET["category"] != "") {
  $category = trim($_GET["category"]);
  $query .= " JOIN categories
              ON posts.category_id = categories.id
              WHERE categories.name = :category
            ";
  $params[":category"] = $category;
}

$posts = $db
          ->execute($query, $params)
          ->fetchAll();


echo "<form>";
echo "<input name='id' value='" . ($_GET["id"] ?? "") ."'/>";
echo "<button>Filter by ID</button>";
echo "</form>";

echo "<form>";
// Null coalescing operator 
echo "<input name='category' value='" . ($_GET["category"] ?? "") . "'/>";
echo "<button>Filter by category</button>";
echo "</form>";

echo "<form>";
echo "Category: ";
echo "<select name='category'>";
echo "<option value='sport'>Sport</option>";
echo  "<option value='music'>Music</option>";
echo  "<option value='food'>Food</option>";
echo  "</select>";
echo "<br>";
echo "<button>Submit</button>";
echo "</form>";

echo "<h1>Posts</h1>";

echo "<ul>";
foreach($posts as $post) {
  echo "<li>" . $post["title"] . "</li>";
}
echo "</ul>";
