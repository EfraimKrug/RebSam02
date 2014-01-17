<!DOCTYPE html>
<html>
<!--
(PCTEXTID smallint NOT NULL AUTO_INCREMENT,
PCTEXT varchar(1024),
PCTRANSLATION varchar(1024),
PCTRANSLITERATION varchar(1024),
PCCITATION varchar(24),
-->
<body>
<?php

$hebrewText = " תִּקנְתָּ שַׁבָּת רָצִיתָ קָרְבְּנוֹתֶיהָ צִוִּיתָ פֵּרוּשֶׁיהָ עִם סִדּוּרֵי נְסָכֶיהָ מְעַנְּגֶיהָ לְעוֹלָם כָּבוֹד יִנְחָלוּ טוֹעֲמֶיהָ חַיִּים זָכוּ ";
$hebrewText .= "וְגַם הָאוֹהֲבִים דְּבָרֶיהָ גְּדֻלָּה בָּחָרוּ אָז מִסִּינַי נִצְטַוּוּ צִוּוּי פָּעֳלֶיהָ כָּרָאוּי";

$HEBTEXT2 = " לכו נרננה לה נריעה לצור ישענו";
$HEBTEXT2 .= " נקדמה פניו בתודה בזמירות נריע לו";
$HEBTEXT2 .= " כי אל גדול ה ומלך גדול על כל אלוהים";
$HEBTEXT2 .= " אשר בידו מחקרי ארץ ותועפות הרים לו";
$HEBTEXT2 .= "אשר לו הים והוא אשהו ויבשת ידיו יצרו";

$TRANS2 = "O come, let us sing unto the Lord; let us shout for joy to the Rock of our salvation.";
$TRANS2 .= "Let us come before His presence with thanksgiving, let us shout for joy unto Him with psalms. ";
$TRANS2 .= "For the Lord is a great God, and a great King above all gods; ";
$TRANS2 .= "In whose hand are the depths of the earth; the heights of the mountains are His also. ";
$TRANS2 .= "The sea is His, and He made it; and His hands formed the dry land. "; 
$TRANS2 .= "O come, let us bow down and bend the knee; let us kneel before the Lord our Maker; ";
$TRANS2 .= "For He is our God, and we are the people of His pasture, and the flock of His hand. To-day, if ye would but hearken to His voice! ";
$TRANS2 .= "Harden not your heart, as at Meribah, as in the day of Massah in the wilderness; ";
$TRANS2 .= "When your fathers tried Me, proved Me, even though they saw My work. ";
$TRANS2 .= "For forty years was I wearied with that generation, and said: It is a people that do err in their heart, and they have not known My ways; ";
$TRANS2 .= "Wherefore I swore in My wrath, that they should not enter into My rest.";

$TRANSLIT2 = "lekhu nerannenâh layhvh nâriy`âh letsur yish`ênu ";
$TRANSLIT2 .= "neqaddemâh phânâyv bethodhâh bizmiroth nâriya` lo ";
$TRANSLIT2 .= "kiy êl gâdholAdonay umelekh gâdhol `al-kâl-elohiym ";
$TRANSLIT2 .= "asher beyâdhomechqerêy-ârets vetho`aphoth hâriym lo ";
$TRANSLIT2 .= "asher-lo hayyâm vehu `âsâhuveyabbesheth yâdhâyv yâtsâru ";
$TRANSLIT2 .= "bo-u nishtachaveh venikhrâ`âh nibhrekhâhliphnêy-Adonay `osênu ";
$TRANSLIT2 .= "kiy hu elohêynu va-anachnu `ammar`iytho vetso-n yâdho hayyom im-beqolo thishmâ`u ";
$TRANSLIT2 .= "al-taqshulebhabhkhem kimriybhâh keyom massâh bammidhbâr ";
$TRANSLIT2 .= "asher nissuniy-abhothêykhem bechânuniy gam-râ-u pho`oliy ";
$TRANSLIT2 .= "arbâ`iym shânâh âquthbedhor vâ-omar `am to`êy lêbhâbh hêm vehêm lo-yâdh`u dherâkhây ";
$TRANSLIT2 .= "asher-nishba`tiy bhe-appiy im-yebho-un el-menuchâthiy";
#echo "--> " . "$HEBTEXT2" . " <--";
#echo "<BR>--> " . "$TRANS2" . " <--";
#echo "<br>--> " . "$TRANSLIT2" . " <--";
#exit;
$sql = array(
"INSERT INTO PCText

(PCTEXT,PCTRANSLATION,PCTRANSLITERATION, PCCITATION)
VALUES
('$hebrewText', 'Establishing Sabbath makes desireable your offerings, you have commanded the libation offerings in their order', 'TAKANTA SHABBOS ROTZE KARBONOSEHA TZIVUHA PERUSHEHA NESACHEHA SIDDUREHA', 'Shabbos Musaf');",

"INSERT INTO PCText

(PCTEXT,PCTRANSLATION,PCTRANSLITERATION, PCCITATION)
VALUES
('$HEBTEXT2', '$TRANS2', '$TRANSLIT2', 'Psalms 95');",
);


include_once 'DB2.php';
include 'ENVIRONMENT.php';
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);

for($i=0;$i<count($sql);$i++)
{
echo "&&**$sql[$i]**&&";
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