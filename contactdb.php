<?php

$db_host = 'localhost';
$db_name = 'team40db';
$username = 'root';
$password = '';

try{

    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);    
    echo("Successfully connected to the database.<br>");
}catch(PDOexception $ex) {
    echo("Failed to connect to the database.<br>");
    echo($ex->getmessage());
    exit;
}

?>