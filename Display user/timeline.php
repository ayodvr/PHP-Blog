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
	<title>Timeline</title>
 <style>
 body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
 </style>
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

 <link rel="stylesheet" href="css/mystyle.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css.map">
<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css.map">
<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css.map">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
</head>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            
                            <div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    
                                    <h2 style="text-align: center;">
                                      Manage Content 
                                    </h2>
                        
                                  
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="showuser.php" role="tab" aria-controls="home" aria-selected="true">Timeline</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="profile.php" role="tab" aria-controls="home" aria-selected="true">Account</a>
                                </li>
                    
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <a href="home.php" class="btn btn-primary">Home</a> 
                     <a href="logout.php" class="btn btn-primary">Log Out</a>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="panel-body" style="margin: auto;">
              
                <?php
                if(is_array($select_res) && !empty($select_res)){ 
                ?>
                
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                     <th class="hidden-xs"></th>
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
                </div>
            </form>           
        </div>
        
<script type="text/javascript" src="bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js.map"></script>
<script type="text/javascript" src="bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js.map"></script>



</body>
</html>