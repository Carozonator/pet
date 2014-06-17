<?php
namespace pluralpet;

include dirname(__FILE__).'/config.php';

// Check if user is logged in
session_start();
/*
if(! isset($_SESSION['username'])){
    new SessionController();
}*/
$request = new Request();
echo "fde";
$controller_name = ucfirst($request->getController()).'Controller';
echo "fd";
$controller = FactoryController::build($controller_name,$request);
echo "hola";
$controller->init();
echo "hola";

?>
