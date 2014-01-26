<?php
/**
 * Efraim Krug
 **/
include_once 'DB2PDO.php';
include 'ENVIRONMENT.php';

$menu = "";
if(isset($_GET['menu'])){
	$menu = $_GET['menu'];
	}
	
$connection = 0;
if(isset($_GET['connection'])){
	$connection = $_GET['connection'];
	}

$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);

$dbObject->getMenu($menu);
echo $dbObject->getResultSet();
