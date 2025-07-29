<?php
    $servername = 'localhost';
    $username = 'pma';
    $password = '5257';
    $dbname = 'inventory_ebay';

    // Connecting to Database
    // TODO: update 'dbname' to your database name. 
    try{
        $conn = new PDO("mysql:host=$servername;dbname=inventory_ebay", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected!';
    } catch(\Exception $e){
        $error_message = $e->getMessage();
    }
?>