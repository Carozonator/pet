<?php



namespace pluralpet;


error_reporting(E_ERROR);
ini_set('display_errors', 1);

include dirname(__FILE__).'/config.php';


// Check if user is logged in
session_start();
/*
if(! isset($_SESSION['username'])){
    new SessionController();
}*/

$request = new Request();
$controller_name = ucfirst($request->getController()).'Controller';
$controller = FactoryController::build($controller_name,$request);
$controller->init();


?>
