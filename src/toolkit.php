<?php
echo "page appeler";
function dd(...$params)
{
    foreach ($params as $key => $param)
{    echo "<pre>";
    var_dump($param);
    echo "<pre>";
}
    return;
}

function ddd(...$params)
{
    echo "<pre>";
    var_dump($params);
    echo "<pre>";
    die();
}

function debugMode($active)
{
    if($active){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
    return;
}

function fromInc($name) {
    (file_exists(include "./templates/includes/". $name . ".inc.php")){
        include "./templates/includes/". $name . ".inc.php" 
    }else {
    return false;
    }
}

function IncludePage($name) {
    try {
        fromInc($_GET["page"]);
    } catch (exception $e) {
        echo "page pas trouver";
    }
}

function getLayout($name) {
    (file_exists(include "./templates/layout/". $name . ".inc.php")){
        include "./templates/layout/". $name . ".inc.php" 
    }else {
    return false;
    }
}