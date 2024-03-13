<?php

require "functions.php";

$url_array = parse_url($_SERVER["REQUEST_URI"]);
$url = $url_array["path"];


// Ja cilvēks iet uz /,
// tad gribam parādīt /controllers/index.php
if ($url == "/") {
  require "controllers/index.php";
}

// Ja cilvēks iet uz /about,
// tad gribam parādīt /controllers/about.php
if ($url == "/about") {
  require "controllers/about.php";
}

// Ja cilvēks iet uz /story,
// tad gribam parādīt /controllers/story.php
if ($url == "/story") {
  require "controllers/story.php";
}