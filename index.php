<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/global.css">
    <title>Index</title>
</head>
<body>
    
</body>
</html>


<?php

require_once './configs/bootstrap.php';
if(isset($_GET["page"])){
    fromInc($_GET['page']);
}

$contacts = $connection->query(queryBuilder('r', 'contacts'));
$pageContent = [
    "html" => ob_get_clean(),
    "data" => [
        'contacts' => $contacts
    ]
];

include "./templates/layouts/html.layout.php";