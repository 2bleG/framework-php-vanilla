<?php

$connexion = new PDO("mysql:host=" . $globalConfigs["database"]["host"] . ";dbname=" . $globalConfigs["database"]["dbName"] . ";port=" . $globalConfigs["database"]["port"], $globalConfigs["database"]["user"], $globalConfigs["database"]["password"]);

// $statement = $connexion->prepare("INSERT INTO `contacts` (`name`, `surname`, `status`) VALUES ('Ogier', 'Grégoire', 'online') ");
// $statement->execute();
