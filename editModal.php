<?php
    require_once ('connect.php');
    $id = $_POST['id'];
    

    $stmt = $conn->prepare("SELECT * FROM technician WHERE id = $id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmt->fetchAll();
    foreach($data as $row){
        echo json_encode($row);
    }
    
?>