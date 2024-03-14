<?php
require "functions.php";

$url_array = parse_url($_SERVER["REQUEST_URI"]);

$url = $url_array["path"];


// Ja cilvēks iet uz /,
// tad gribam parādīt /controllers/index.php
if ($url == "/") {
  require "controllers/index.php";
} else if ($url == "/about") {
  require "controllers/about.php";
} else if ($url == "/story") {
  require "controllers/story.php";
} else {
  http_response_code(404);
  require "controllers/404.php";
}