<?php

require_once './configs/bootstrap.php';
ob_start();
if(isset($_GET["page"])){
    fromInc($_GET['page']);
}

$connexion->query(queryBuilder('r','contact'))
$pageContent = [
    "html" => ob_get_clean(),
    "data" => [
        'contacts' => []
    ]
];

include "./templates/layouts/". $_GET["layout"] .".layout.php";

