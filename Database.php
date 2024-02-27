<?php

class Database {

  private $pdo;

  // Savienojamies ar datu bāzi tikai vienreiz
  public function __construct()
  {
    $connection_string = "mysql:host=localhost;dbname=blog_IPb22;user=root;password=root;charset=utf8mb4";
    $this->pdo = new PDO($connection_string);
    $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }

  // execute vai query
  public function execute($query_string) {
    // 1. Sagatavot SQL izpildei
    $query = $this->pdo->prepare($query_string);

    // 2. Izpilīt SQL
    $query->execute();
    // 3. Atgriezt rezultātu!
    return $query;
  }
}