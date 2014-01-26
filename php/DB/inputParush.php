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
(PCPRESENTATIONDATE,PCSUBMITDATE,PCTEXTID,PCAUTHORID,PCSOURCEAUTHOR,PCSIDDURPLACE,PCTHEME1,PCTHEME2,PCTHEME3,PCTEASE,PCAUDIO,PCPARUSH)
VALUES
('2014-01-25','2014-01-18',1,2,0,1,'Open your heart','Fix Shabbos!','', 'Look at the davining! We have to fix', '', 'Look at the davining! We have to fix the Shabbos - how? G-d Wants us to be so close... Hashem is asking us to explain the siddur until the words slide off the page and into our hearts!');",

"INSERT INTO PCParush
(PCPRESENTATIONDATE,PCSUBMITDATE,PCTEXTID,PCAUTHORID,PCSOURCEAUTHOR,PCSIDDURPLACE,PCTHEME1,PCTHEME2,PCTHEME3,PCTEASE,PCAUDIO,PCPARUSH)
VALUES
('2014-01-24','2014-01-20',2,2,0,2,'Listen','Not Alone','The world is alive','If we just listen... awesome! If we','','If we just listen... awesome! If we can just listen to the mountains the way they are davining!');",

"INSERT INTO PCParush
(PCPRESENTATIONDATE,PCSUBMITDATE,PCTEXTID,PCAUTHORID,PCSOURCEAUTHOR,PCSIDDURPLACE,PCTHEME1,PCTHEME2,PCTHEME3,PCTEASE,PCAUDIO,PCPARUSH)
VALUES
('2014-01-23','2014-01-19',0,2,1,3,'Closeness to Hashem','Secrets','Intimacy','Whispering A Secret Into G-d\'s Ear','ShmoneEsrei.m4a','The Tanya explains that Shemonah Esrei is popularly referred to as the silent prayer because during its recital we attempt to feel such a closeness to the divine it is as if we are standing next to a King or our most important leader and quietly whispering a secret into his ear. The imparting of secret whispered information generally signifies a matter of great importance is being shared between parties that have a close personal relationship. During the recital of the silent prayer we should attempt to feel the deepest connection to its important blessings of Kindness, strength, life, redemption, sanctity, health and success and all of its other blessings. Though all of us are need of these blessings what makes the silent prayer so special is the private comfort zone it creates between every individual and G-d. The public repetition of this prayer which follows its silent rendition creates an atmosphere of communal sharing but for true community to be experienced it must first allow for the deepest individuality to be expressed.');",

"INSERT INTO PCParush
(PCPRESENTATIONDATE,PCSUBMITDATE,PCTEXTID,PCAUTHORID,PCSOURCEAUTHOR,PCSIDDURPLACE,PCTHEME1,PCTHEME2,PCTHEME3,PCTEASE,PCAUDIO,PCPARUSH)
VALUES
('2014-01-22','2014-01-19',0,2,2,3,'Closeness to Hashem','Lifting Yourself','Physical to Spiritual','A unique quality of the Silent Prayer Service is that it is not just its content that expresses the loftiness...','','A unique quality of the Silent Prayer Service is that it is not just its content that expresses the loftiness of this prayer. Your physical body through its silence and unique standing position speaks powerfully and profoundly about the High State of this prayer. The Arizal finds distinctiveness in the required standing position of the Shemonah Esrei that differentiates it from all other prayers and thus places it on a higher level. It is interesting that in the prayers preceding the Shemonah Esrei one is generally in a seated position. It is as if to enter into the Silent Prayer spirit you need to literally rise and lift up your physical being to set a tone of seeking to get into a higher consciousness.  Generally we think of our physicality as being an impediment to achieve a higher spiritual state whereas in the Shemonah Esrei it actually helps stimulate a higher spiritual state.  If you are flying high  spiritually but if it is not affecting your physical being then the experience is  grossly lacking. According to both Jewish law  and Kabbalah the Shemonah Esrei is considered the highest of all the prayers.(1) So as you begin preparing yourself to step into the Shemonah Esra you should make an extra physical effort to concentrate deeper on the words that you or the Cantor are reciting. This will  lead you to make a greater physical efforts to concentrate on the words of the  Shemonah Esrei and help you hear, feel and absorb their important  messages. If your physical body, to what ever degree it is capable, will be consciously involved in the spiritual experience of the Silent prayer you as a person will become more spiritually aware and humanly refined.');",

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