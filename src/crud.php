<?php 
require_once "./src/dbConnect.php";



//fonction getAll
$statement = $connection->query("SELECT * FROM contacts WHERE 1");
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

//fonction getById
$statement = $connection->query("SELECT * FROM contacts WHERE `name` =  \"OGIER\" AND `surname` = '".htmlspecialchars( $_GET['surname'])."'");
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

//fonction create 
$statement = $connection->prepare("INSERT INTO `contacts` (`name`, `surname`, `status`) VALUES (?, ?, 'online') ");
$statement->bindParam(1,$_GET["name"]);
$statement->bindParam(2,$_GET["surname"]);
$statement->execute();

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

$hey