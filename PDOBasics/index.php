<?php

$host = "localhost";
$user = "root";
$password = "";
$dbName = "pdotest";


// set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;

// Create a PDO Instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


/*
    SELECT CLAUSE

    $status = 'admin';

    $sql = "SELECT * FROM `users` WHERE status = :status";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(["status" => $status]);

    $users = $stmt->fetchAll();

    foreach ($users as $user) {
        echo $user->name . "<br>";
    }
*/

$name = "John Doe";
$email = "johndoe@gmail.com";
$status = "guest";

$sql = 'INSERT INTO users(name , email, status) VALUES (:name, :email, :status)';
$stmt = $pdo->prepare($sql);
$stmt->execute(["name" => $name, "email" => $email, "status" => $status]);
echo "user added";