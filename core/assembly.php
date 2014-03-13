<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function __autoload($class_name) {
    include $class_name . '.php';
}

$red->nav=new navigation;
$red->sql=new MySQL;
$red->html=new HTML;

//default variables
$id=$red->nav->id;
?>