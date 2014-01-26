<!DOCTYPE html>
<html>
<body>

<?php
$sql = array(
"INSERT INTO PCSourceAuthor
(PCTITLE,PCFNAME,PCLNAME,PCTOWN,PCSEFER)
VALUES
('Rebbe', 'Shneur Zalman', '', 'Liadi', 'Tanya');",

"INSERT INTO PCSourceAuthor
(PCTITLE,PCFNAME,PCLNAME,PCTOWN,PCSEFER)
VALUES
('Rebbe', 'Levi Yitzchak', '', 'Berditchev', 'Kiddushas Levi');"

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