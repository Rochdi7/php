<?php
$host = "localhost";
$user = "root"; 
$password = "";
$dbname = "crude-practice";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo("connection succes!!!");
} catch (PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
}
?>
