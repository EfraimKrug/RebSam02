<!DOCTYPE html>
<html>
<!--
PCPLACE varchar(25),
PCSERVICE varchar(25),
-->
<body>
<?php
$sql = array(
"INSERT INTO PCSiddurPlace
(PCPLACE,PCSERVICE)
VALUES
('Shmonei Esrei', 'Shabbos Musaf');",

"INSERT INTO PCSiddurPlace
(PCPLACE,PCSERVICE)
VALUES
('Psalm 95', 'Kabbalos Shabbos');");

include_once 'DB2.php';
include 'ENVIRONMENT.php';
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);

for($i=0;$i<count($sql);$i++)
{
echo "&&$sql[$i]&&";
if ($dbObject->runRawSQL($sql[$i]))
  {
  echo "<br>" . stristr($sql[$i],"(", true) . " Successful<br>";
  }
else
  {
  echo "<br>Database Error: " . $dbObject->displayError();
  echo "<br>{{ $sql[$i] }}";
  }
}
$dbObject->DBClose();
?> 

</body>
</html>