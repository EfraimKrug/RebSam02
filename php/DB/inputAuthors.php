<!DOCTYPE html>
<html>
<body>
<?php
$sql = array(
"INSERT INTO PCAuthor
(PCTITLE,PCFNAME,PCLNAME,PCEMAIL,PCPHONE)
VALUES
('Mr', 'Efraim', 'Krug', 'EfraimMKrug@GMail.com', '6177806984');",

"INSERT INTO PCAuthor
(PCTITLE,PCFNAME,PCLNAME,PCEMAIL,PCPHONE)
VALUES
('Rabbi', 'Shmuel', 'Intrator', 'KavanahLife@GMail.com', '8019874653');",

"INSERT INTO PCAuthor
(PCTITLE,PCFNAME,PCLNAME,PCEMAIL,PCPHONE)
VALUES
('Dr', 'Nancy', 'Norton', 'NancyBN18@GMail.com', '6177790136');"
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