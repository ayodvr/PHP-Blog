<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start();
include_once("class/users.php");
if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
    $employees =  new User();
    $select_res = $employees->read_one_rec($_SESSION['username']);  
    //$user = new User();
    //$user_post = $user->read_one_rec($id);
}    
   
   
$employees = new User();
$select_res = $employees->read_post();
?>

<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
</head>
<body>
   
<div class="container">
    <div class="row">
    
    <p></p>
    <h1 style="text-align: center;">Timeline</h1>
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title"></h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                
                  </div>
                </div>
              </div>
              <div class="panel-body">
              
                <?php
                if(is_array($select_res) && !empty($select_res)){ 
                ?>
                
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                     <th class="hidden-xs">ID</th>
                        <th>Username</th>
                        <th>Title</th>
                        <th>Image</th>
                    </tr> 
                  </thead>
                 <?php
                 }  
                 ?>
                 
                        <?php
                        $x = 1;
                        foreach( $select_res as $row ){ 
                            $id = $row['id'];
                            $title = $row['title'];
                            if($_SESSION['username'] != $row['username'])
                            continue;
                             /*"echo <pre>";
                            print_r($row);
                            "echo </pre>";*/
                        ?>
                        
                    <tbody>
                          <tr>
                            <td align="center">
                             <a href="editpost.php?id=<?=$row['id']?>" class="btn btn-default" ><em class="fa fa-pencil"></em></a>
                             <a href="#" onclick='show_alert(<?php echo json_encode($id);?>, <?php echo json_encode($title);?>)' class="btn btn-danger"><em class="fa fa-trash"></em></a>
                             <a href="singlepost.php?id=<?=$row['id']?>" class="btn btn-primary" ><em class="fa fa-eye"></em></a>
                            </td>
                            <td class="hidden-xs"><?=$x?></td>
                            <td><?=$row['username']?></td>
                            <td><?=$row['title']?></td>
                            <td><img src="image/<?php if(isset($row['image']) && $row['image'] !="") echo $row['image']; else echo "noimage.jpg";?>" width='150px' height="150px" /></td>
                           
                          </tr>
                        </tbody>
                        <?php
                            $x++;
                        }
  
                        ?>
                </table>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                 
                  
                </div>
              </div>
            </div>

</div></div></div>
<script>
function show_alert(id,title){
    
    var actn = confirm("Do you really want to delete ("+title+") from the list");
    if (actn == true){
        actn = alert("Record deleted successfully"); 
        location.href = "delete.php?id="+id;
    }
}

</script>

</body>
</html>