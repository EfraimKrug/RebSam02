<!DOCTYPE html>
<html>
<body>
	<!-- updated January 16 -->
	<!-- Documentation on database:
	Table:
		PCAuthor: 	Person who sent in the parush
		PCText:		Actual text parush is on
		PCParush:	Explanation from PCAuthor
	
	Organization:
		Parush:
			According to text (citation)
			According to author (person submitting parush e.g. Shmuel Yitchak)
			According to real author (person who thought it e.g. Shlomo Carlebach)
			According to position in siddur (e.g. Shacharis, Pesukei d'Zimra)
			According to theme (as stated my submitting author e.g. salvation)
			According to date presented (today's kavanah/yesterday's... )
		
		PCPRESENTATIONDATE date,	//date last presented
		PCSUBMITDATE date,			//date submitted by author
		PCTEXTID smallint,			//into the PCText table - if there is a text
		PCAUTHORID smallint,		//into the PCAUTHOR table - 0 = anonymous
		PCSOURCEAUTHOR smallint,	//into the PCSOURCEAUTHOR table - 0 = n/a
		PCSIDDURPLACE smallint,		//into the PCSIDDURPLACE table - 0 = n/a (e.g. 
		PCTHEME1 varchar(24),		// themes chosen by author
		PCTHEME2 varchar(24),
		PCTHEME3 varchar(24),
		PCPARUSH varchar(1024),		//and the parush - in english for now...

	-->
<?php
$sql = array(
"DROP DATABASE pearl;",
"CREATE DATABASE pearl;",

"DROP TABLE PCSiddurPlace;",
"DROP TABLE PCText;",  
"DROP TABLE PCParush;",
"DROP TABLE PCSourceAuthor;",
"DROP TABLE PCAuthor;",
"DROP TABLE PCUser;",
"DROP TABLE PCEvent;",
"DROP TABLE PCSubEvent;",
"DROP TABLE PCEventSpeaker;",
"DROP TABLE PCSubEventSpeaker;",
"DROP TABLE PCMenu;",

"CREATE TABLE PCSourceAuthor
(PCSOURCEAUTHORID smallint NOT NULL AUTO_INCREMENT,
PCTITLE varchar(5),
PCFNAME varchar(15),
PCLNAME varchar(15),
PCTOWN varchar(25),
PCSEFER varchar(25),
PRIMARY KEY(PCSOURCEAUTHORID));",

"CREATE TABLE PCAuthor
(PCAUTHORID smallint NOT NULL AUTO_INCREMENT,
PCTITLE varchar(5),
PCFNAME varchar(15),
PCLNAME varchar(15),
PCEMAIL varchar(75),
PCPHONE varchar(10),
PRIMARY KEY(PCAUTHORID));",

"CREATE TABLE PCUser
(PCUSERID smallint NOT NULL AUTO_INCREMENT,
PCTITLE varchar(5),
PCFNAME varchar(15),
PCLNAME varchar(15),
PCEMAIL varchar(75),
PCPHONE varchar(10),
PRIMARY KEY(PCUSERID))",

"CREATE TABLE PCSiddurPlace
(PCSIDDURPLACEID smallint NOT NULL AUTO_INCREMENT,
PCPLACE varchar(25),
PCSERVICE varchar(25),
PRIMARY KEY(PCSIDDURPLACEID))",

"CREATE TABLE PCParush
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

"CREATE TABLE PCEvent
(PCEVENTID smallint NOT NULL AUTO_INCREMENT,
PCSTARTDATE date,
PCENDDATE date,
PCSTARTTIME time,
PCENDTIME time,
PCTITLE varchar(64),
PCINSTITUTION varchar(64),
PCORGANIZINGUSER smallint,
PRIMARY KEY(PCEVENTID))",

"CREATE TABLE PCSubEvent
(PCSUBEVENTID smallint NOT NULL AUTO_INCREMENT,
PCSTARTDATE date,
PCENDDATE date,
PCSTARTTIME time,
PCENDTIME time,
PCTITLE varchar(64),
PCORGANIZINGUSER smallint,
PCINSTITUTION varchar(64),
PCEVENTID smallint NOT NULL,
PRIMARY KEY(PCSUBEVENTID))",

"CREATE TABLE PCEventSpeaker
(PCEVENTID smallint NOT NULL,
 PCSPEAKERID smallint NOT NULL,
 PRIMARY KEY(PCEVENTID, PCSPEAKERID))",

"CREATE TABLE PCSubEventSpeaker
(PCSUBEVENTID smallint NOT NULL,
 PCSPEAKERID smallint NOT NULL,
 PRIMARY KEY(PCSUBEVENTID, PCSPEAKERID))",
 
"CREATE TABLE PCText
(PCTEXTID smallint NOT NULL AUTO_INCREMENT,
PCTEXT varchar(1024),
PCTRANSLATION varchar(1024),
PCTRANSLITERATION varchar(1024),
PCCITATION varchar(24),
PRIMARY KEY(PCTEXTID))",

"CREATE TABLE PCMenu
(PCMENUID smallint NOT NULL AUTO_INCREMENT,
PCMENUNAME varchar(24),
PCLABEL varchar(24),
PCCONNECTION varchar (256),
PRIMARY KEY(PCMENUID))",
);

include_once 'DB2.php';
include 'ENVIRONMENT.php';
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);

for($i=2;$i<count($sql);$i++)
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