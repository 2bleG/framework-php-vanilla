'Nvmeless/framework-php-vanilla'
<?php

require_once './configs/bootstrap.php';
// ob_start();
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

// $pageContent = ob_get_clean();
// include "./templates/layouts/". $_GET["html"] .".layout.php";
include "./templates/layouts/html.layout.php";