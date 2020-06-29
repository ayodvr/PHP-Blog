<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
include_once("class/users.php");
session_start();

if(isset($_GET['post_id'])){
$post_id = $_GET['post_id'] != ""? $_GET['post_id'] : "";
//echo $id;
     $employee =  new User();
     $employee_rec = $employee->read_single_post($post_id);
     //echo"<pre>";
     //print_r($employee_rec);
     //echo"</pre>";die;
}

 if ($_SESSION['username'] == "" && ($_SESSION['username'] != $employee_rec['username'])){
         	echo "<script>alert('Ooops! Unauthorized....Please Log in')</script>"; 
 			header("refresh:0.00001; url=index.php");		
 			die();
         }
 
 if(isset($_POST['update'])){
    
    //echo"<pre>";
    //print_r($_POST);
    //echo"</pre>";die;
    if(isset($_FILES['imageUpload'])){
    $_POST['imageUpload'] = $_FILES['imageUpload'];
}
     $new_emp = new User();
     $update_rec = $new_emp->update_post($_POST['id'],$_POST);
     
     //echo"<pre>";
   // print_r($update_rec);
   // echo"</pre>";
    
     //print_r($update_rec);
 }
 ?>
<!DOCTYPE html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="#" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
	<div class="row">
    	<div class="col-md-3 ">
		      
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
              		  <div class="col-md-3 border-right">
		                    <h4>Edit Post</h4>
		                </div>
          
		            </div>
		            <hr>
		            <div class="row">
		                <div class="col-md-8">
        		            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                            <input  type="hidden" name="created_at" id="created_at"/>
                            <input  type="hidden" name="id" value="<?=$employee_rec['id']?>"/>
                            <script>

                                        function getTimeStamp() {
                                               var now = new Date();
                                               return ((now.getMonth() + 1) + '/' + (now.getDate()) + '/' + now.getFullYear() + " " + now.getHours() + ':'
                                         + ((now.getMinutes() < 10) ? ("0" + now.getMinutes()) : (now.getMinutes())) + ':' + ((now.getSeconds() < 10) ? ("0" + now.getSeconds()) : (now.getSeconds())));
                                        }
                                        
                                        function setTime() {
                                            document.getElementById('created_at').value = getTimeStamp();
                                            
                                        }
                                        

                            </script>
                            <input type="hidden" name="id" class="form-control here"  value="<?=$post_id?>"/>
                              <div class="form-group row">
                                <label for="text" class="col-12 col-form-label">Enter Title here</label> 
                                <div class="col-12">
                                  <input id="text" name="title" value="<?=$employee_rec['title']?>"placeholder="Enter Title here" class="form-control here" type="text">                             
                                </div>
                              </div>
                              <div class="form-group row">
                               
                                <div class="col-12">
                                <img style="width: 150px; height: 150px;" src="image/<?=$employee_rec['image']?>"/>
                                <label for="text" class="col-12 col-form-label">Upload Image</label>
                                  <input type="file" name="imageUpload" class="form-control here"/>
                               
                              </div>
                              <div class="form-group row">
                                <label for="textarea" class="col-12 col-form-label">Body</label> 
                                <div class="col-12">
                                  <textarea id="textarea" name="body" cols="40" rows="5" class="form-control"><?=$employee_rec['body']?></textarea>
                                </div>
                                <div class="col-md-7">
		                          <button type="submit" name="update" onclick="setTime();" class="btn btn-sm btn-primary" style="margin-top: 15px;">Update Post</button>
                                </div>
                              </div> 
                            </form>
        		        </div>
        		        
        		    </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
</body>
</html>