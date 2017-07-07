<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HSFM</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/HSFM.css" rel="stylesheet">
	<script src="../js/respond.js"></script>
</head>

<body>
<!--javascript-->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	
	
<div style="height: 50px; background-color:#404348; margin-bottom: 50px">
	<a href="user_home.php"><img style="height: 35px; width: 35px; position: absolute; top: 8px; left: 22px" src="helmets/ohio.jpg">
        <p class="website_name">HSF<span style="color:#d6d6d6">CHALLENGE</span></p></a>
</div>


<!--Fluid container for full width-->
<div class="container-fluid">

<!--Login form-->
	<div class="row">
		<div class="text-center">
			<div class="col-xs-6 col-sm-2 col-sm-offset-4">
				<h4 style="color:#fff">Create an account</h4>
				<br>
				<form action="" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" name="email">
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="pass">
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_pass">
					</div>
					
					<div class="form-group">
						<input type="text" class="form-control" placeholder="First Name" name="firstname">
					</div>
					
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Last Name" name="lastname">
					</div>
					
					<input class="btn btn-primary btn-sm" style="width:120px" type="submit" value="Create Account" name="submit"/>
				</form>
	
			<!--Create Account form-->	
			<?php
				if(isset($_POST["submit"])){
					
					if(!empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['confirm_pass']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {
						
						if ($_POST["pass"] == $_POST["confirm_pass"]) {
							
								$email=$_POST['email'];
								$pass=$_POST['pass'];
								$pass=$_POST['confirm_pass'];
								$firstname=$_POST['firstname'];
								$lastname=$_POST['lastname'];

								$servername = "localhost";
								$username = "root";
								$password = "";

								$con = new mysqli($servername, $username, $password);
								if ($con->connect_error) {
							    	die("Connection failed: " . $con->connect_error);
								}
								if (!mysqli_select_db($con, "hsfm"))  {  
							  		echo "Unable to locate the database";   
							  		exit();  
								}

								$checkUser="SELECT * FROM users WHERE email='".$email."'";
								$query=mysqli_query($con, $checkUser);
								$numrows=mysqli_num_rows($query);
								
							if($numrows==0) {
								$sql="INSERT INTO users (email, password, first_name, last_name) VALUES('$email','$pass','$firstname','$lastname')";
								$res=mysqli_query($con, $sql);

								if($res){	
									session_start();
									$_SESSION["sess_user"]= $email;
									
									header("Refresh:1; url=user_home.php");
									//echo "Account Successfully Created";
								} else {
									echo "Error";
								}

							} else {
								echo "User already exists.";
							}

						} else {
							echo "Passwords do not match";
						}
						
					} else {
						echo "All fields are required";
					}
				}
			?>
			</div>
			
			<div class="col-xs-6 col-sm-2">
				<h4 style="color:#fff">Already a member?</h4>
				<br>
				<br>
				<br>
				<p><a class="btn btn-primary btn-sm" style="width:120px; margin-top: -39px" href="home.php" role="button">Sign In</a></p>
			</div>
		</div>
	</div>
	
</div>
<!--end container-->

</body>
</html>