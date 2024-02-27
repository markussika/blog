<?php
require "functions.php";

// echo "he";

$connection_string = "mysql:host=localhost;dbname=blog_Sika;user=root;password=;charset=utf8mb4";
$pdo = new PDO($connection_string);


$query = $pdo->prepare("SELECT * FROM posts"); //sagatavo SQL izspildei
$query->execute();
$posts = $query->fetchALL(PDO::FETCH_ASSOC);



echo "<ul>";
foreach($posts as $post){
    echo "<li>". $post["title"]."</li>";
}
echo "</ul>";
