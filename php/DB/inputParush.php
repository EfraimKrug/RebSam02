<!DOCTYPE html>
<html>
<!--
(PCPARUSHID smallint NOT NULL AUTO_INCREMENT,
PCPRESENTATIONDATE date,
PCSUBMITDATE date,
PCTEXTID smallint,
PCAUTHORID smallint,
PCSOURCEAUTHOR smallint,
PCSIDDURPLACE smallint,
PCTHEME1 varchar(24),
PCTHEME2 varchar(24),
PCTHEME3 varchar(24),
PCPARUSH varchar(1024),
PRIMARY KEY(PCPARUSHID))", 
-->
<body>
<?php
$sql = array(
"INSERT INTO PCParush
(PCPRESENTATIONDATE,PCSUBMITDATE,PCTEXTID,PCAUTHORID,PCSOURCEAUTHOR,PCSIDDURPLACE,PCTHEME1,PCTHEME2,PCTHEME3,PCPARUSH)
VALUES
('2014-01-16','2014-01-19',1,2,0,1,'Open your heart','Fix Shabbos!','','Look at the davining! We have to fix the Shabbos - how? G-d Wants us to be so close... Hashem is asking us to explain the siddur until the words slide off the page and into our hearts!');",

"INSERT INTO PCParush
(PCPRESENTATIONDATE,PCSUBMITDATE,PCTEXTID,PCAUTHORID,PCSOURCEAUTHOR,PCSIDDURPLACE,PCTHEME1,PCTHEME2,PCTHEME3,PCPARUSH)
VALUES
('2014-01-17','2014-01-20',2,2,0,2,'Listen','Not Alone','The world is alive','If we just listen... awesome! If we can just listen to the mountains the way they are davining!');",


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