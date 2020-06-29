<?php
include_once("class/users.php");
if(isset($_POST['submit'])){

    $users =  new User();
    $users->create_recs($_POST);
    
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Create Account</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
       <link rel="icon" href="favicon.ico" type="image/x-icon">
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-color: #d9d9d9;">
			<div class="inner" style="border-radius: 20px;">
				
				<form name="regform" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="width: 100%;">
					<h3>Create Account</h3>
					<div class="form-group">
						<input type="text" name="fname" placeholder="First Name" class="form-control">
						<input type="text"  name="lname"placeholder="Last Name" class="form-control">
					</div>
                    <div class="form-wrapper">
						<input type="text" name="username" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>	
					<div class="form-wrapper">
						<input type="text" name="email" placeholder="Email Address" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="gender" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
                            <option name="gender" value="male">Male</option>
							<option name="gender" value="female">Female</option>
							<option name="gender" value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="pword" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="cpword" placeholder="Confirm Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button name="submit" style="border-radius: 20px;background-color: #21d4fd;">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
                    <div class="form-wrapper" style="margin-left: 100px; margin-top: 10px; padding: 10px; ">
						<span class="txt1">
							Have an account?
						</span>

						<a class="txt2" href="login.php">
							 &nbsp;Login
						</a>
					</div>
				</form>
			</div>
		</div>
	   <script src="JsMain/validateForm.js"></script>	
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>