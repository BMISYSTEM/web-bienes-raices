<?php
define('TEMPLATE_URL',__DIR__ .'/template');
define('FUNCIONES_URL',__DIR__.'funciones.php');
function incluirtemplate(string $template,bool $inicio = false){
    include TEMPLATE_URL . "/${template}.php";
}

function debugear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}