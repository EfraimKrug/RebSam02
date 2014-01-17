<?php

include_once 'DB2PDO.php';
include 'ENVIRONMENT.php';
$dbObject = DBFactory::getFactory()->getDB(ENVIRONMENT);
$dbObject->dumpTable('PCParush');
echo $dbObject->getResultSet();
exit;
getMessages();
function getMessages() {
    $sql = "select * FROM PCParush ORDER BY PCPRESENTATIONDATE";
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
    $dbhost="localhost"; 
    $dbuser="root";     
    $dbpass="";      
    $dbname="pearl"; 
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}