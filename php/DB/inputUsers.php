<!DOCTYPE html>
<html>
<body>
<?php
$sql = array(
"INSERT INTO PCUser
(PCTITLE,PCFNAME,PCLNAME,PCEMAIL,PCPHONE)
VALUES
('Mr', 'Bob', 'Smith', 'BillyBob@GMail.com', '4539998723');",

"INSERT INTO PCUser
(PCTITLE,PCFNAME,PCLNAME,PCEMAIL,PCPHONE)
VALUES
('Dr', 'Theodore', 'Seuss', 'DrSeuss@GMail.com', '4539998724');",

"INSERT INTO PCUser
(PCTITLE,PCFNAME,PCLNAME,PCEMAIL,PCPHONE)
VALUES
('Professor', 'William', 'Daunten', 'Professor@GMail.com', '7876542312');",
);

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