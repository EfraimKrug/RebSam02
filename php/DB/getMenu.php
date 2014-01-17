<?php
/**
 * Efraim Krug
 **/
$usage = 'junk';
if(isset($_GET['usage'])){
	$usage = $_GET['usage'];
	}
	
$return0 = "[{\"ENTRY\":\"Shacharis\"}, {\"ENTRY\":\"Mincha\"}, {\"ENTRY\":\"Maariv\"}, {\"ENTRY\":\"Kabbalat Shabbat\"}]";
$return1 = "[{\"ENTRY\":\"Brachas\",  \"ENTRY\":\"P'sukei d'zimra\", \"ENTRY\":\"Krias Sh'ma\", \"ENTRY\":\"Shmone Eisrei\", \"ENTRY\":\"Ashrei - u'va'l'zion\", \"ENTRY\":\"Shir haYom\", \"ENTRY\":\"Aleinu\"}]";
$return2 = "[{\"ENTRY\":\"Ashrei\"},  {\"ENTRY\":\"Sh'monei Eisrei\"}, {\"ENTRY\":\"Alenu\"}]";
$return3 = "[{\"ENTRY\":\"Krias Sh'ma\",  \"ENTRY\":\"Sh'monei Eisrei\", \"ENTRY\":\"Alenu\"}]";
$return4 = "[{\"ENTRY\":\"Psalm 95\",  \"ENTRY\":\"Psalm 96\",  \"ENTRY\":\"Psalm 97\", \"ENTRY\":\"Psalm 98\", \"ENTRY\":\"Psalm 99\", \"ENTRY\":\"Mizmor l'David\", \"ENTRY\":\"Lecha Dodi\", \"ENTRY\":\"Shir shel Shabbos\", \"ENTRY\":\"Krias Sh'ma\", \"ENTRY\":\"Sh'monei Eisrei\", \"ENTRY\":\"Alenu\"}]";

if($usage == "Shacharis"){
	$return = $return1;
	#echo "php1: " . $return;
} elseif ($usage == "Mincha"){
	$return = $return2;
} elseif ($usage == "Maariv"){
	$return = $return3;
} elseif ($usage == "KabbalatShabbat"){
	$return = $return4;
} else {
	$return = $return0;
	#echo "php2: " . $return;
}

$return = array(array("ENTRY" => "Shacharis"), array("ENTRY" => "Mincha"));
//echo json_encode($return);
return json_encode($return);
?>