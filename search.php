<?php
$CODE = $_POST['itemname'];
$con=mysqli_connect("localhost","root","12345678","test");
$sql = "SELECT * FROM technician where CODE = $CODE";
// ค้นหาหน้าและหลังอะไรก็ได้ $sql = "SELECT * FROM technician where CODE like '%{$_POST['itemname']}%'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array(mysqli_query($con,$sql));

$outp.="
<div class='table table-responsive'>
    <div>
    <label >รหัสนักศึกษา :". $row['CODE'] . "</label>    <br>
    <label >ชื่อ :". $row['NAME'] . "</label>    <br>
    </div>
 <table class='table table-borsered'>
 <thead>
 <tr>
 <th scope='col'>ลำดับ</th>
 <th scope='col'>รหัสวิชา</th>
 <th scope='col'>หน่วยกิต</th>
 <th scope='col'>ระดับ</th>
 
 </tr>
 </thead>
 <tbody>";
 $i=0; $sum=0; $sumgrade=0; $gpa=0;
  while ($result = mysqli_fetch_array($query)) { 
    $i++;
    $sum += $result['CREDIT'];
    $GRADE= $result['GRADE'];
        $AR_GRADE = array("A"=>4,"B+"=>3.5,"B"=>3,"C+"=>2.5,"C"=>2,"D"=>1.5,"D+"=>1,"F"=>0,"W"=>'');
    $sumgrade += $AR_GRADE[$GRADE]*$result['CREDIT'];
    
    $outp.="
    <tr>
    <td>" . $i . "</td>
    <td>" . $result['TECHNICIAN'] . "</td>
    <td>" . $result['CREDIT'] . "</td>
    <td>" . $result['GRADE'] . "</td>
    </tr> ";
     } 
    $number = $sumgrade / $sum ;
    $gpa = number_format($number, 2, '.', '');  
    $outp.="</tbody>
    </table>
    จำนวนหน่วยกิตที่เรียน :&nbsp; " . $sum ." &nbsp;
    ค่าคะแนนเฉลี่ย (GPA.)&nbsp;". $sumgrade ."/". $sum ."&nbsp; = &nbsp;". $gpa ."
    </div>";
    
    echo $outp;
?>