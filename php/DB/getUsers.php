<?php
/**
 * Created by JetBrains PhpStorm.
 * User: foysal
 * Date: 10/26/13
 * Time: 9:32 PM
 * To change this template use File | Settings | File Templates.
 **/
$level = "Prod";
$usage = "PCUser";
#$usage = $_GET['usage'];
#
if($usage == "PCUser"){
	$sql = "select * FROM PCUser ORDER BY PCLNAME";
} elseif ($usage == "PCAuthor"){
	$sql = "select * FROM PCAuthor ORDER BY PCLNAME";
} else {
	$sql = "select * FROM PCUser ORDER BY PCLNAME";
}

getMessages();
function getMessages() {
	$sql = $GLOBALS["sql"];
    ##$sql = "select * FROM PCUser ORDER BY PCLNAME";
    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        echo json_encode($messages);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function getConnection() {
$level = "Local";
	if($level == "Prod"){
		$dbhost="efraimmkrugcom.domaincommysql.com";
		$dbuser="pearl";     
		$dbpass="pray_613";      
		$dbname="pearl"; 
	}
	else	{
		$dbhost="localhost"; 
		$dbuser="root";     
		$dbpass="";      
		$dbname="pearl"; 
	}

    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}