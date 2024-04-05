<?php

require "Validator.php";
require "Database.php";
$config = require("config.php");
$db = new Database($config);

//if ($_SERVER["REQUEST_METHOD"] == "POST" && trim($_POST["title"]) != "" && $_POST["category-id"] <= 3 && strlen($_POST["title"]) <= 255) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = [];

  if (!Validator::string($_POST["title"], min: 1, max: 255)) {
    $errors["title"] = "Title cannot be empty or too long";
  }

  if ($_POST["category-id"] < 1 || $_POST["category-id"] > 3) {
    $errors["category-id"] = "Category ID invalid";
  }

  if (empty($errors)) {
    $query = "INSERT INTO posts (title, category_id)
              VALUES (:title, :category_id);";
    $params = [
        ":title" => $_POST["title"],
        ":category_id" => $_POST["category-id"]
    ];
    $db->execute($query, $params);

    header("Location: /");
    die();
  }

  
}

$title = "Create a Post";
require "views/posts/create.view.php";

