<?php   
    require_once ('connect.php');
    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT * FROM technician WHERE id = $id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmt->fetchAll();
    $outp='';
    $outp.="<div class='table table-responsive'>
    <table class='table table-borsered'>";
    foreach($data as $row){
        $outp.='
                <tr>
                    <td><label>CODE</label></td>
                    <td>'.$row['CODE'].'</td>
                </tr>';
        $outp.='
                <tr>
                    <td><label>NAME</label></td>
                    <td>'.$row['NAME'].'</td>
                </tr>';
        $outp.='
                <tr>
                    <td><label>TECHNICIAN</label></td>
                    <td>'.$row['TECHNICIAN'].'</td>
                </tr>';
        $outp.='
                <tr>
                    <td><label>CREDIT</label></td>
                    <td>'.$row['CREDIT'].'</td>
                </tr>';
        $outp.='
                <tr>
                    <td><label>GRADE</label></td>
                    <td>'.$row['GRADE'].'</td>
                </tr>';
    }
    $outp.="</table></div>";

    echo $outp;
?>