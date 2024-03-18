<?php
// Šis fails ir, lai izvadītu datus no datubāzes uz
// lapu 
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
          
$title = "Posts 🙂";
require "views/posts.view.php";