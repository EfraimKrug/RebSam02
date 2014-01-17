<?php
/**
 * Created by JetBrains PhpStorm.
 * User: foysal
 * Date: 10/26/13
 * Time: 9:32 PM
 * To change this template use File | Settings | File Templates.
 */

getMessages();
function getMessages() {
    $sql = "select * FROM PCAuthor ORDER BY PCLNAME";
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