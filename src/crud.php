<?php 
require_once "./src/dbConnect.php";



//fonction getAll
$statement = $connection->query("SELECT * FROM contacts WHERE 1");
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

//fonction getById
function read($connection, $name, $surname) {
    $statement = $connection->prepare("SELECT * FROM contacts WHERE `name` = :name AND `surname` = :surname");
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':surname', $surname, PDO::PARAM_STR);
    $statement->execute();
    $donnee = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

$name = $_GET['name'];
$surname = $_GET['surname'];
$result = read($connection, $name, $surname);

//fonction create 
function create ($connection, $name, $surname) {
    $statement = $connection->prepare("INSERT INTO `contacts` (`name`, `surname`, `status`) VALUES (?, ?, 'online')");
    $statement->bindParam(1, $name);
    $statement->bindParam(2, $surname);
    $statement->execute();
}

$name = $_GET["name"];
$surname = $_GET["surname"];
create($connection, $name, $surname);

//fonction delete
$val = 20;

function delete($connection, $id) {
    $statement = $connection->prepare("DELETE FROM `contacts` WHERE id = :id");
    $statement->bindParam(':id', $id);
    $statement->execute();
}

delete($connection, $val);

//fonction update
$cible = 30;

function update($connection, $id) {
    $statement = $connection->prepare("UPDATE `contacts` SET `status` = 'online' WHERE id = :id");
    $statement->bindParam(':id', $id);
    $statement->execute();   
}

update($connection, $cible);