<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "12345678";
    $db_name = "test";

    try{
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        $e->getMassage();
    }

    
?>