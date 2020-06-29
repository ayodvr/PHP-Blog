<?php
session_start();
include_once("class/users.php");
if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
    $employees =  new User();
    $select_res = $employees->read_one_rec($_SESSION['username']);
}else{
     echo "<script>alert('You are not authorised..Please Log in')</script>";
     header("refresh:2; url=http://localhost/blog_app/index.php"); 
     die();    
}

if(isset($_FILES['imageUpload'])){
    $_POST['imageUpload'] = $_FILES['imageUpload'];
}

if (isset($_POST['submit'])){
    
    $user_post = new User();
    $update_post = $user_post->create_post($_POST);
  
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
		     <div class="list-group ">
              <a href="profile.php" class="list-group-item list-group-item-action active">Dashboard</a>
              
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
              		  <div class="col-md-3 border-right">
		                    <h4>Add New Post</h4>
		                </div>
          
		            </div>
		            <hr>
		            <div class="row">
		                <div class="col-md-8">
        		            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                            <input  type="hidden" name="created_at" id="created_at" />
                            <input  type="hidden" name="username" value="<?=$select_res['username']?>"/>
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
                              <div class="form-group row">
                                <label for="text" class="col-12 col-form-label">Enter Title here</label> 
                                <div class="col-12">
                                  <input id="text" name="title" placeholder="Enter Title here" class="form-control here" type="text">                             
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-12 col-form-label">Upload Image</label> 
                                <div class="col-12">
                                  <input type="file" name="imageUpload" placeholder="Enter Title here" class="form-control here" required="required">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="textarea" class="col-12 col-form-label">Body</label> 
                                <div class="col-12">
                                  <textarea id="textarea" name="body" cols="40" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="col-md-7">
		                          <button type="submit" name="submit" onclick="setTime();" class="btn btn-sm btn-primary" style="margin-top: 15px;">Add Post</button>
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