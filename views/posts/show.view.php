<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

<h1><?= htmlspecialchars($post["title"]) ?></h1>

<a href="/edit?id=<?= $post["id"] ?>">Edit</a>

<?php require "views/components/footer.php" ?>