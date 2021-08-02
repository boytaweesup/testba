<?php
    require_once ('connect.php');
    $id = $_POST['id'];
    try {
        $sql = "DELETE FROM technician WHERE id = $id";
        $conn->exec($sql);
        echo "Record deleted successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
?>