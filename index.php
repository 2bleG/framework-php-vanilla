<?php
ob_start();

require_once './configs/bootstrap.php';
include_once './templates/html_layout.php';
if(isset($_GET["page"])){
    fromInc($_GET["page"]);
};
$pageContent = ob_get_clean();
getLayout("html");
