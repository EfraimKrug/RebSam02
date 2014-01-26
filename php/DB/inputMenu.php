<!DOCTYPE html>
<html>
<body>
<?php
$sql = array(
"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('About Us', 'Endorsements', 'Endorsements.html');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('About Us', 'Reb Sam', 'RebSam.html');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('About Us', 'Irma', 'Irma.html');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Donate', 'Anything', 'donation');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Donate', 'Zikaron', 'zikaron');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Donate', 'Yahrzeit', 'yahrzeit');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Donate', 'Birthday', 'birthday');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Donate', 'Sponsor', 'sponsor');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Siddur', 'Daily', 'Daily');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Siddur', 'Shabbos', 'Shabbos');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Siddur', 'Yomtiv', 'Yomtiv');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Kavanah', 'Today', 'Today');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Kavanah', 'Yesterday', 'Yesterday');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('Kavanah', 'History', 'History');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('BaruchH', 'Thanks', 'Thanks');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('BaruchH', 'Praise', 'Praise');",

"INSERT INTO PCMenu
(PCMENUNAME,PCLABEL,PCCONNECTION)
VALUES
('BaruchH', 'Request', 'Request');",

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