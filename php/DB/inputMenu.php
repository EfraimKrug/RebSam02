<!DOCTYPE html>
<html>
<body>
<?php
$sql = array(
"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Shacharis', 'Shacharis', 'Shacharis.html');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Shacharis', 'Mincha', 'Mincha.html');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Shacharis', 'Maariv', 'Maariv.html');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Shacharis', 'KabbalatShabbat', 'KabbalatShabbat.html');",
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