<?php
    require_once ('connect.php');
    
    $ID=$_POST['ID'];
    $CODE=$_POST['CODE'];
    $NAME=$_POST['NAME'];
    $TECHNICIAN=$_POST['TECHNICIAN'];
    $CREDIT=$_POST['CREDIT'];
    $GRADE=$_POST['GRADE'];
    
    if($ID!=''){
        $query="UPDATE technician SET CODE='$CODE', NAME='$NAME', TECHNICIAN='$TECHNICIAN', CREDIT='$CREDIT', GRADE='$GRADE' WHERE ID='$ID' ";
        
    }else{
        $query="INSERT INTO technician (CODE,NAME,TECHNICIAN,CREDIT,GRADE) values('$CODE','$NAME','$TECHNICIAN','$CREDIT','$GRADE')";
        
    }
    if($conn->exec($query)){
        echo "Complete";
    }else{
        echo "Error";
    }
    

    
?>