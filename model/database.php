<?php

$servername = "localhost";
$user = "root";
$password = "ilyass2002@-@-";
$dbname = "assignment";
$dsn = "mysql:host=$servername;dbname=$dbname";

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {

    $error = "Database Error " . $e->getMessage();
    include("view/error.php");
    exit();
}
