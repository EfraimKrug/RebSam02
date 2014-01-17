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

echo "<br>================ D U M P I N G === T H E ===  <U>A U T H O R</U> ===  D A T A B A S E  ==========================<br>";
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);
$dbObject->dumpTable("PCAuthor");
dumpTable($dbObject, "PCAuthor");

$dbObject->DBClose();
?>