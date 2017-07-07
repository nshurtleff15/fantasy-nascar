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
	<link href="css/HSFM.css" rel="stylesheet">
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

<body class="homepage">
<div>
<!--javascript-->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	
<!--<nav role="navigation" class="navbar navbar-default" style="border-radius: 0px 0px 0px 0px">
    <!- Brand and toggle get grouped for better mobile display
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="bracket.php" class="homeBtn" style="padding:5px 15px;">HSFM</a>
    </div>
     Collection of nav links, forms, and other content for toggling 
</nav>-->

<div style="height: 50px; background-color:#404348">
	<a href="user_home.php"><img style="height: 35px; width: 35px; position: absolute; top: 8px; left: 22px" src="helmets/ohio.jpg">
        <p class="website_name">HSF<span style="color:#d6d6d6">CHALLENGE</span></p></a>
</div>
	
<!--Fluid container for full width-->
<div class="container-fluid">
	<img src="helmets/mentHud.jpg" id="slide" width="1366" height="593" style="left: 0px; position: absolute;" />

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

	<div class="row">
		<div class="text-center">
			<div class="col-xs-6 col-sm-2 sign_in" style="left:565px; top:100px; border-radius:10px">
				<h4 style="color:#007AC3; padding:2px"></h4>
				<form action="" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" name="email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="pass">
					</div>
					<input class="btn btn-primary btn-sm" style="width:120px" type="submit" value="Sign In" name="submit"/>
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
	</div>
	<div class="col-xs-6 col-sm-2 sign_in" style="border-radius:10px; top:120px; left:550px">		
		<h4 style="color:#007AC3">Not Already A Member?</h4>
		<p><a class="btn btn-primary btn-sm" style="width:120px" href="sign_up.php" role="button">Sign Up Today!</a></p>
	</div>

</div>
<!--end container-->
</div>
</body>
</html>