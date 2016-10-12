<?php

echo 'Hello, world!<hr>';

try {

    $pdo = new PDO('mysql:host=db;dbname=php', 'php', 'php');

    $sql = "CREATE TABLE my_guests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL
    )";

    $pdo->exec($sql);

    echo 'table created<hr>';

    $sql = "INSERT INTO my_guests(first_name, last_name)
        VALUES(:first_name, :last_name)";

    $statement = $pdo->prepare($sql);
    $statement->execute(array(
        "first_name" => "John",
        "last_name" => "Doe",
    ));

    echo 'data inserted<hr>';

    $sql = 'SELECT first_name, last_name FROM my_guests ORDER BY last_name, first_name';
    foreach ($pdo->query($sql) as $row) {
        echo $row['last_name'] . ", ";
        echo $row['first_name'] . "<hr>";
    }

    echo 'data displayed<hr>';

} catch (PDOException $e) {
    echo 'Error on line ' . $e->getLine() . ' : ' . $e->getMessage() . '<hr>';
    die();
}