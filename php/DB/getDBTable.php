<?php
/**
 * Efraim Krug
 **/
include_once 'DB2PDO.php';
include 'ENVIRONMENT.php';

if(isset($_GET['usage'])){
	$usage = $_GET['usage'];
	}

$table = "";
if(isset($_GET['table'])){
	$table = $_GET['table'];
	}
	
$key = 0;
if(isset($_GET['key'])){
	$key = $_GET['key'];
	}

$date = "";
if(isset($_GET['date'])){
	$date = $_GET['date'];
	}

$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);
$dbObject->setKey($key);
if($date != ""){
	$dbObject->setDate($date);
	$dbObject->getTableByDate($table);
	}
else {
	$dbObject->dumpTable($table);
	}
echo $dbObject->getResultSet();
