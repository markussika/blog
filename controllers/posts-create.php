<?php

require "Database.php";
$config = require("config.php");
$db = new Database($config);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $query = "INSERT INTO posts (title, category_id)
            VALUES (:title, :category_id);";
  $params = [
    ":title" => $_POST["title"],
    ":category_id" => $_POST["category-id"]
  ];
  $db->execute($query, $params);

  header("Location: /");
  die();


  // Ja viss iet,
  // tad izveido šādu pasākumu un
  // kolektīvu pievienošanu
  // CKC projektā
}

$title = "Create a Post";
require "views/posts-create.view.php";

