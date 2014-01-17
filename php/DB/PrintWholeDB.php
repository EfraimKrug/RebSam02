<?php
include 'DB2.php';
include 'ENVIRONMENT.php';
/*
 * A general record dump of the database
 * Now working with DB2.php
 * 
 */
function dumpTable($dbObj, $table){
echo "<br>================= " . $table . " ============================";
$dbObj->dumpTable($table);
while($row = $dbObj->getNextRecord())
	{
	echo "<br>";
	foreach ($row as $idx => $val){
		if(!is_int($idx)){
			echo $idx . ": {" . $val . "}";
			}
		}
	}
}

echo "<br>================ D U M P I N G === T H E ===  <U>A U T H O R</U> T A B L E  ==========================<br>";
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);
$dbObject->dumpTable("PCAuthor");
dumpTable($dbObject, "PCAuthor");

echo "<br>================ D U M P I N G === T H E ===  <U>U S E R </U> T A B L E  ==========================<br>";
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);
$dbObject->dumpTable("PCUser");
dumpTable($dbObject, "PCUser");

echo "<br>================ D U M P I N G === T H E ===  <U>T E X T </U> T A B L E  ==========================<br>";
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);
$dbObject->dumpTable("PCText");
dumpTable($dbObject, "PCText");

echo "<br>================ D U M P I N G === T H E ===  <U>S I D D U R   P L A C E </U> T A B L E  ==========================<br>";
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);
$dbObject->dumpTable("PCSiddurPlace");
dumpTable($dbObject, "PCSiddurPlace");

echo "<br>================ D U M P I N G === T H E ===  <U>P A R U S H </U> T A B L E  ==========================<br>";
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);
$dbObject->dumpTable("PCParush");
dumpTable($dbObject, "PCParush");

$dbObject->DBClose();
?>