<?php

    require_once ('connect.php');
    $stmt = $conn->prepare("SELECT * FROM technician");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmt->fetchAll();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap -->
    <!-- AJAX -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
</head>
<body>
    <div class="container">
    <h1 class="bg-light py-4 text-info">
         registration system
    </h1>
                <form class="row g-3" name="searchform" id="searchform" method="post" >
                <table class="table table ">
                <div class="col-md-4">
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="itemname" name="itemname"   placeholder="Search"
                        maxlength="9" title="กรุณากรอกตัวเลข และ ตัวแรกเป็นเลข 0" pattern="^0[0-9]{8}$" required>
                        <button class="btn btn-outline-secondary" type="submit" id="btnSearch">Search</button>
                    </div>
                </div>
                </table>
            </form>
            <div  >
                <button class="btn btn-success" name="add" id="add" data-toggle="modal" data-target="#addModal">ADD</button>
            </div>    
        
        
      <div class="table-responsive">
          <table class="table ">
              <thead>
              <tr >
                  <th scope="col">CODE</th>
                  <th scope="col">NAME</th>
                  <th scope="col">TECHNICIAN</th>
                  <th scope="col">CREDIT</th>
                  <th scope="col">GRAD</th>
                  <th scope="col" width="5%">VIEW</th>
                  <th scope="col" width="5%">EDIT</th>
                  <th scope="col" width="5%">DELETE</th>
              </tr>
            </thead>
              <tbody >
              <?php
              foreach($data as $row){?>
                <tr>				
                    <td><?php echo $row['CODE'];?></td>
                    <td><?php echo $row['NAME'];?></td>
                    <td><?php echo $row['TECHNICIAN'];?></td>
                    <td><?php echo $row['CREDIT'];?></td>
                    <td>
                        <?php 
                            $GRADE= $row['GRADE'];
                            
                            $AR_GRADE = array("A"=>4,"B+"=>3.5,"B"=>3,"C+"=>2.5,"C"=>2,"D"=>1.5,"D+"=>1,"F"=>0,"W"=>'W');
                            // echo $GRADE."=>";
                            echo $AR_GRADE[$GRADE];
                            
                            // $AR_GRADE = array("A","B+","B","C+","C","D","D+","F","W");
                            //     foreach ($AR_GRADE as $value)
                            //     {
                            //     echo "$value <br>";
                            //     }


                        ?>
                    </td>
                    <td><input type="button" name="view" value="view" class="btn btn-info btn-xs view_data" id="<?php echo $row['ID'];?>"/></td>
                    <td><input type="button" name="edit" value="edit" class="btn btn-secondary btn-xs edit_data" id="<?php echo $row['ID'];?>"/></td>
                    <td><input type="button" name="delete" value="delete" class="btn btn-danger btn-xs delete_data" id="<?php echo $row['ID'];?>"/></td>
                </tr>
              <?php  }?>
              </tbody>
          </table>
      </div>
      
    </div>
    <div class="loading"></div>
 <div class="row" id="list-data" style="margin-top: 10px;">
 
 </div>
 </div>
<?php require 'viewModal.php' ?>
<?php require 'insertModal.php' ?>
<?php require 'searchModal.php' ?>
    



    




<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Bootstrap -->
</body>
<script>
    $(document).ready(function(){
        $('#add').click(function(){
                 $('#addModal').modal('show');
        });
        $('#insert-form').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url:"insert.php",
                    method:"post",
                    data:$('#insert-form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("insert..");
                        
                    },
                    success:function(data){
                        $('#insert-form')[0].reset();
                        $('#addModal').modal('hide');
                        location.reload();
                    }
                });
        }); 
        $('#searchform').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url:"search.php",
                    method:"post",
                    data:$('#itemname').serialize(),
                    success:function(data){
                        $('#detailsearch').html(data);
                        $('#searchModal').modal('show');
                        
                    }
                });
        }); 
        // $('#btnSearch').click(function(){
            
        //     $.ajax({
        //         url:"search.php",
        //         method:"post",
        //         data:$('#itemname').serialize(),
        //         success:function(data){
        //             $('#detail').html(data);
        //             $('#searchModal').modal('show');
        //         }
        //     });
        // });
        $('.view_data').click(function(){
            var uid=$(this).attr("id");
            $.ajax({
                url:"select.php",
                method:"post",
                data:{id:uid},
                success:function(data){
                    $('#detail').html(data);
                    $('#dataModal').modal('show');
                }
            });
        });
        $('.edit_data').click(function(){
            var uid=$(this).attr("id");
            $.ajax({
                url:"editModal.php",
                method:"post",
                data:{id:uid},
                dataType:"json",
                success:function(data){
                    $('#ID').val(data.ID);
                    $('#CODE').val(data.CODE);
                    $('#NAME').val(data.NAME);
                    $('#TECHNICIAN').val(data.TECHNICIAN);
                    $('#CREDIT').val(data.CREDIT);
                    $('#GRADE').val(data.GRADE);
                    $('#insert').val("Update");
                    $('#addModal').modal('show');
                }
            });
        });
        $('.delete_data').click(function(){
            var uid=$(this).attr("id");
            var status=confirm("Are you delete");
            if(status){
                $.ajax({
                url:"delete.php",
                method:"post",
                data:{id:uid},
                success:function(data){
                    location.reload();
                }
            });
            }
            
        });
        
        
    });
</script>
</html>