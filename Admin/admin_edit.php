<!DOCTYPE html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="#" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
              <a href="show.php" class="list-group-item list-group-item-action">Manage Users</a>
              <a href="#" class="list-group-item list-group-item-action">Manage Posts</a>
              <a href="#" class="list-group-item list-group-item-action">Manage Topics</a>
              
              
              
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-3 border-right">
		                    <h4>Add New Post</h4>
		                </div>
		                <div class="col-md-7">
		                    <button type="button" class="btn btn-sm btn-primary">Add New</button>
		                </div>
		                
		            </div>
		            <hr>
		            <div class="row">
		                <div class="col-md-8">
        		            <form>
                              <div class="form-group row">
                                <label for="text" class="col-12 col-form-label">Enter Title here</label> 
                                <div class="col-12">
                                  <input id="text" name="text" placeholder="Enter Title here" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="textarea" class="col-12 col-form-label">Visual Editor</label> 
                                <div class="col-12">
                                  <textarea id="textarea" name="textarea" cols="40" rows="5" class="form-control"></textarea>
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