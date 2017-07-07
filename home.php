<?php
if(isset($_SESSION["sess_user"])){
	header("location: user_home.php");
}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HSFC</title>
	<link href="css/bootstrap.css" rel="stylesheet">

	<script src="js/respond.js"></script>

	<script type="text/javascript">

	var slideimages = new Array() // create new array to preload images
	slideimages[0] = new Image() // create new instance of image object
	slideimages[0].src = "helmets/bene3.jpg" // set image src property to image path, preloading image in the process
	slideimages[1] = new Image()
	slideimages[1].src = "helmets/glen.jpg"
	slideimages[2] = new Image()
	slideimages[2].src = "helmets/eds.jpg"
	slideimages[3] = new Image()
	slideimages[3].src = "helmets/mentHud.jpg"

	</script>
</head>

<style type="text/css">

	.website_name {
	    color:#007AC3;
	    font-size:18px;
	    display: inline-block;
	    position: relative;
	    top: 3px;
	}

	.sign_in {
	    background-color: #404348;
	    border-radius: 10px;
	    width: 275px;
	    margin: auto;
	    float: none;
	    text-align: center;
	    position: relative;
	    top: 150px;
	}

	.container_nav {
		display: block; 
		width: 100%; 
		height: 50px; 
		margin: 0; 
		background-color:#404348;
		position: absolute;
		z-index: 1;
	}

	.container_page {
		height: 100%;
	}

	.sign_in_group {
		width: auto; 
		height: 100%
		margin: 0 auto;
		border: 4px solid red;
	}

	.sign_in_top {
		padding-top: 30px;
		padding-bottom: 10px;
	}

	.sign_in_bottom {
		padding-top: 5px;
		padding-bottom: 5px;
		margin-top: 20px;
	}

	.home_link {
		position: relative;
		top: 7px;
		left: 15px;
	}

</style>

<body>
	<div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	

		
	
<!--Fluid container for full width-->
		<div class="container_page">

			<div class="container_nav">
				<a class="home_link" href="user_home.php"><img height="35px" width="35px" src="helmets/ohio.jpg">
		        	<p class="website_name">HSF<span style="color:#d6d6d6">CHALLENGE</span></p></a>
			</div>

			<img src="helmets/mentHud.jpg" id="slide" width="100%" height="100%" style="position: absolute;" />

			<script type="text/javascript">

			//variable that will increment through the images
			var step=3

			function slideit(){
			 //if browser does not support the image object, exit.
			 if (!document.images)
			  return
			 document.getElementById('slide').src = slideimages[step].src
			 if (step<3)
			  step++
			 else
			  step=0
			 //call function "slideit()" every 2.5 seconds
			 setTimeout("slideit()",10000)
			}

			slideit()

			</script>

			<!--Login form-->
			<div class="sign_in_group">
				<div class="text-center">
					<div class="col-xs-6 col-sm-2 sign_in sign_in_top">
						<form action="" method="POST">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email" name="email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="pass">
							</div>
							<input class="btn btn-primary btn-sm" type="submit" value="Sign In" name="submit" style="width: 50%" />
						</form>
						
						<!--Sign in form-->
						<?php
							if(isset($_POST["submit"])){
								if(!empty($_POST['email']) && !empty($_POST['pass'])) {
									$email=$_POST['email'];
									$pass=$_POST['pass'];

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

									$checkUser="SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'";
									$query=mysqli_query($con, $checkUser);
									$numrows=mysqli_num_rows($query);
											
									if($numrows!=0) {
										while($row=mysqli_fetch_assoc($query)) {
											$dbusername=$row['email'];
											$dbpassword=$row['password'];
										}

										if($email == $dbusername && $pass == $dbpassword) {
											session_start();
											$_SESSION['sess_user'] = $email;

											/* Redirect browser */
											header("Location: user_home.php");
										}
									} 
									else {
											echo "Invalid email or password!";
										}
								} 
								else {
									echo "All fields are required!";
								}
							}
						?>
						<!--End Sign in form-->
								
					</div>					
				</div>

				<div class="col-xs-6 col-sm-2 sign_in sign_in_bottom">		
					<h4 style="color:#d6d6d6">Not Already A Member?</h4>
					<p><a class="btn btn-primary btn-sm" href="sign_up.php" role="button" style="width: 50%">Sign Up Today!</a></p>
				</div>
			</div>
			

		</div>
		<!--end container-->
	</div>
</body>
</html>