<?php
echo "page appeler";
function dd(...$params)
{
    echo "<pre>";
    var_dump($params);
    echo "<pre>";
    return;
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

?>