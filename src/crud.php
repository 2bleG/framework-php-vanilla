<?php

require_once "./src/dbConnect.php";

//fonction getALL

$statement = $connexion->query("SELECT * FROM contacts WHERE 1");
$data = $statement-> fetchAll(PDO::FETCH_ASSOC);

//fonction getById

$statement = $connexion->query("SELECT * FROM contacts WHERE `name` = 'Ogier' AND `surname` = '".htmlspecialchars( $_GET["surname"])."'");
$data = $statement-> fetchAll(PDO::FETCH_ASSOC);
dd($data);

//fonction create

$statement = $connexion->prepare("INSERT INTO `contacts` (`name`, `surname`, `status`) VALUES (?, ?, 'online') ");
$statement->bindParam(1, $_GET["surname"]);
$statement->bindParam(2, $_GET["name"]);
$statement->execute();

// //fonction delete

$statement = $connexion->prepare("DELETE FROM `contacts` WHERE id = ?");
$id = 3;
$statement->bindParam(1, $id);
$statement->execute();

//fonction update

$statement = $connexion->prepare("UPDATE `contacts` SET `status` = `offline` WHERE id = ?");
$id = 22;
$statement->bindParam(1, $id);
$statement->execute();