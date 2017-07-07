<?php
session_start();
ob_start();
if(!isset($_SESSION["sess_user"])){
	header("location: user_home.php");
}

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

$getName = "SELECT first_name FROM users WHERE email = '".$_SESSION["sess_user"]."'";
$res4 = mysqli_query($con, $getName);
$name = mysqli_fetch_array($res4);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HSFC</title>
	<!-- <link href="css/HSFM.css" rel="stylesheet"> -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<style>
		.divSelect {
		    border-radius: 50%/50%; 
		    width: 100px;
		    height: 100px;
		    background: #D6D6D6;
		    border: 5px solid #007AC3;
		    color: #007AC3;
		    font-weight: bold;
		    text-align: center;
		    vertical-align: middle;
		    margin-left: 0px;
		    margin-right: 10px;
		    outline: 0;
		    cursor: pointer;
		}

		.divSelect:hover {
			background: #007AC3;
			color: #fff;
		}

		.btnLine {
		    padding-bottom: 20px;
		}

		.activeBtn {
			background: #007AC3;
			color: #fff;
		}

		.homeBtn {
		    color: #007AC3;
		    font-weight: bold;
		    font-size: 40px; 
		    font-family: garamond;
		}

		.homeBtn:hover {
		    text-decoration: none;
		}

		.sign_in {
		    background-color: #404348;
		    border-radius: 0px;
		    margin: 0px;
		    width: 250px;
		}

		.bracket {
			color: #007AC3;
			font-weight: bold;
		}

		.page {
		    margin: 0 auto;
		    width: 1250px;
		}

		.homepage {
		    /*background-image: url(http://waitingfornextyear.com/wp-content/uploads/2010/05/Ohio-High-School-Football.jpg);
		    background-repeat: no-repeat;
		    background-size: 100% 100%;*/
		}

		body {
		    margin: 0px;
		    min-height: 100%;
		    min-width: 1300px;
		    background: -webkit-linear-gradient(#194775, #848484); /* For Safari 5.1 to 6.0 */
		    background: -o-linear-gradient(#194775, #848484); /* For Opera 11.1 to 12.0 */
		    background: -moz-linear-gradient(#194775, #848484); /* For Firefox 3.6 to 15 */
		    background: linear-gradient(#194775, #848484);  /*Standard syntax */
		    background-repeat: no-repeat;
		    background-color: #848484;
		}

		html {
		    margin: 0px;
		    height: 100%;
		    min-width: 1300px;
		}

		.background {
		    position: relative;
		    background-color: #fff;
		    /*border: solid 1px #007AC3;*/
		}

		.background:before {  
		    content: "";
		    position: absolute;
		    top: 0;
		    bottom: 0;
		    left: 0;
		    right: 0;
		    z-index: 1;
		    background-image: url("css/ohsaa.jpg");
		    background-repeat: no-repeat;
		    background-position: center;
		    background-size: 35% 70%;
		    opacity: 0.4;
		}

		.tb {
		    position: relative;
		    z-index: 2;
		}

		.brackTitle {
		    display: inline;
		    top: 50px;
		    position: relative;
		}

		.helmet1 {
		    top: 310px;
		    position: absolute;
		    right: 630px;
		    width: 100px;
		    height: 100px;
		}

		.helmet2 {
		    top: 310px;
		    position: absolute;
		    right: 505px;
		    width: 100px;
		    height: 100px;
		    background-color: #fff;
		}

		.helmet3 {
		    position: absolute;
		    top: 55px;
		    right: 530px;
		}

		.champ {
		    position: absolute;
		    right: 505px;
		    width: 240px;
		    border-top: solid 2px #007AC3;
		    border-bottom: solid 2px #007AC3;
		    border-right: solid 2px #007AC3;
		    border-left: solid 2px #007AC3;
		    font-size: 24px;
		    color: #fff;
		    background-color: #007AC3;
		    text-align: center;
		    padding: 0px;
		    border-radius: 10px;
		    cursor: text;
		}

		.champ_text {
		    position: absolute; 
		    left:580px;
		    top: 40px;
		    font-size: 18px;
		    z-index: 5;
		}

		.region_label {
		    position: absolute;
		    top: 252px;
		    font-weight: bold;
		    opacity: 0.4;
		}

		.region_label_top {
		    position: absolute;
		    top: 113px;
		    font-weight: bold;
		    opacity: 0.4;
		}

		.region_label_bottom {
		    position: absolute;
		    top: 460px;
		    font-weight: bold;
		    opacity: 0.4;
		}

		.state_final_label {
		    position: absolute;
		    top: 250px;
		}

		table {
		  border-collapse: collapse;
		  border: none;
		  font: small arial, helvetica, sans-serif;
		  color: #007AC3;
		  font-weight: bold;
		}

		td {
		  vertical-align: middle;
		  width: 10em;
		  margin: 0;
		  padding: 0;
		}

		td p {
		  border-top: solid 1px #007AC3;
		  border-bottom: solid 1px #007AC3;
		  border-right: solid 1px #007AC3;
		  border-left: solid 1px #007AC3;
		  margin: 5px;
		  padding: 2px 2px 2px 2px;
		  background-color: #fff;
		  text-decoration: none;
		}

		td p:hover,
		td input:hover {
		  border-top: solid 1px #007AC3;
		  border-bottom: solid 1px #007AC3;
		  border-right: solid 1px #007AC3;
		  border-left: solid 1px #007AC3;
		  margin: 5px;
		  padding: 2px 2px 2px 2px;
		  color: #fff;
		  background-color: #007AC3;
		  font-weight: bold;
		  text-decoration: none;
		}

		td input {
		  border-top: solid 1px #007AC3;
		  border-bottom: solid 1px #007AC3;
		  border-right: solid 1px #007AC3;
		  border-left: solid 1px #007AC3;
		  margin: 5px;
		  padding: 2px 2px 2px 2px;
		  background-color: #D6D6D6;
		  text-decoration: none;
		  color: #007AC3;
		  font-weight: bold;
		  width: 8.8em;
		  text-align: left;
		  cursor: pointer;
		}

		.final_four_top {
		  border-top: solid 1px #007AC3;
		  border-bottom: solid 1px #007AC3;
		  border-right: solid 1px #007AC3;
		  border-left: solid 1px #007AC3;
		  margin: 5px;
		  padding: 2px 2px 2px 2px;
		  background-color: #D6D6D6;
		  text-decoration: none;
		  color: #007AC3;
		  font-weight: bold;
		  width: 8.2em;
		  text-align: left;
		  cursor: pointer;
		  position: absolute;
		  top: 278px;
		  height:21px;
		}

		.final_four_bottom {
		  border-top: solid 1px #007AC3;
		  border-bottom: solid 1px #007AC3;
		  border-right: solid 1px #007AC3;
		  border-left: solid 1px #007AC3;
		  margin: 5px;
		  padding: 2px 2px 2px 2px;
		  background-color: #D6D6D6;
		  text-decoration: none;
		  color: #007AC3;
		  font-weight: bold;
		  width: 8.2em;
		  text-align: left;
		  cursor: pointer;
		  position: absolute;
		  top: 316px;
		  height:21px;
		}

		.finals_box {
		    height: 105px;
		    width: 550px;
		    background-color: #007AC3;
		    opacity: 0.6;
		    position: absolute;
		    left: 350px;
		    top: 260px;
		    z-index: -3;
		    border-radius: 10px;
		}

		.submit {
		    width:100px;
		    position:absolute;
		    border: 2px solid #E6A126;
		    border-radius: 5px;
		    background-color: #FFB32A;
		    color: black;
		    right:575px;
		    bottom: 65px;
		}

		.submit:hover {
		    background-color: #FFBB3F;
		    border: 2px solid #FFB32A;
		}

		.bracket-line-vert {
		    position: absolute;
		    width: 1px;
		    z-index: 3;
		    background-color: #007AC3;
		}

		.bracket-line-horiz {
		    position: absolute;
		    width: 6px;
		    height: 1px;
		    z-index: 3;
		    background-color: #007AC3;
		}

		.rounds {
		    margin: 0; 
		    text-align: left; 
		    color: #007AC3;
		    background-color: #fff;
		    padding-bottom: 20px;
		    padding-top: 5px;
		}

		.bracket_info {
		    background-color: #404348;
		    height: 100px;
		    width: 475px;
		    border-radius: 20px;
		    margin-bottom: 30px;
		    margin-top: 30px;
		}

		.bracket_name {
		    background-color: #404348; 
		    height: 40px; 
		    width: 375px; 
		    position: relative; 
		    top: 13px; 
		    left: 10px;
		    text-align: left;
		    color: #007AC3;
		    font-size: 28px;
		}

		.bracket_type {
		    background-color: #2b2e34; 
		    height: 20px; 
		    width: 110px;
		    position: relative; 
		    top: 25px; 
		    left: 10px;
		    text-align: center;
		    color: #007AC3;
		    border-radius: 5px;
		}

		.bracket_groups {
		    background-color: #2b2e34; 
		    height: 20px; 
		    width: 300px;
		    position: relative; 
		    top: 5px; 
		    left: 150px;
		    text-align: center;
		    color: #007AC3;
		    border-radius: 5px;
		}

		.bracket_create {
		    position:absolute; 
		    color:#007AC3; 
		    text-align:left;
		    background-color: #404348;
		    top: 80px;
		    padding: 20px;
		    padding-top: 10px;
		    border-radius: 5px;
		    left: 10px;
		    height: 140px;
		}

		.website_name {
		    position: absolute;
		    left:55px;
		    top: 14px;
		    color:#007AC3;
		    font-size:18px;
		    height:25px;
		    width:150px;
		}

		.profile_name {
		    text-align:left;
		    position:absolute;
		    top: 14px;
		    left:1150px;
		    color: #007AC3;
		    background-color: #404348;
		    border: none;
		}

		.profile_name:hover,
		.profile_name:focus {
		    color: #80BCE1;
		}

		.top_nav {
		    height: 50px;
		    background-color:#404348;
		}

		#profile_wrap
		{
		    position: absolute;
		    top:15px;
		    left:150px;
		}

		#profile_wrap ul
		{
		    list-style:none;
		    position:relative;
		    float:left;
		    margin:0;
		    padding:0;
		}

		#profile_wrap ul a
		{
		    display:block;
		    color:#007AC3;
		    text-decoration:none;
		    font-weight:700;
		    font-size:12px;
		    line-height:32px;
		    padding:0 15px;
		    font-family:"HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif;
		}

		#profile_wrap ul li
		{
		    position:relative;
		    float:left;
		    margin:0;
		    padding:0;
		}

		#profile_wrap ul li.current-menu-item
		{
		    background:#ddd;
		}

		#profile_wrap ul li:hover
		{
		    background-color: #404348;
		}

		#profile_wrap ul ul
		{
		    display:none;
		    position:absolute;
		    top:100%;
		    left:0;
		    background:#fff;
		    padding:0;
		}

		#profile_wrap ul ul li
		{
		    float:none;
		    width:160px;
		}

		#profile_wrap ul ul a
		{
		    line-height:120%;
		    padding:10px 15px;
		}

		#profile_wrap ul ul ul
		{
		    top:0;
		    left:100%;
		}

		#profile_wrap ul li:hover > ul
		{
		    display:block;
		    background-color: #2b2e34;
		    text-align: left;
		}

		#game_wrap
		{
		    position: absolute;
		    top:15px;
		    left:150px;
		}

		#game_wrap ul
		{
		    list-style:none;
		    position:relative;
		    float:left;
		    margin:0;
		    padding:0;
		}

		#game_wrap ul a
		{
		    display:block;
		    color:#007AC3;
		    text-decoration:none;
		    font-weight:700;
		    font-size:12px;
		    line-height:35px;
		    padding:0 15px;
		    font-family:"HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif;
		}

		#game_wrap ul li
		{
		    position:relative;
		    float:left;
		    margin:2px;
		    padding:0;
		    background-color: #404348;
		}

		#game_wrap ul li.current-menu-item
		{
		    background:#ddd;
		}

		#game_wrap ul li:hover
		{
		    background-color: #fff;
		}

		#game_wrap ul ul
		{
		    display:none;
		    position:absolute;
		    top:100%;
		    left:0;
		    background:#fff;
		    padding:0;
		}

		#game_wrap ul ul li
		{
		    float:none;
		    width:160px;
		}

		#game_wrap ul ul a
		{
		    line-height:120%;
		    padding:10px 15px;
		}

		#game_wrap ul ul ul
		{
		    top:0;
		    left:100%;
		}

		#game_wrap ul li:hover > ul
		{
		    display:block;
		    background-color: #404348;
		    text-align: left;
		}

		.morecontent span {
		    display: none;
		}

		.morelink {
		    display: block;
		}

		.textFade {
		  -webkit-mask-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0) 85%);
		}

		.nothing {

		}
	</style>

</head>
<body>
<nav class="top_nav">
    <a href="user_home.php"><img style="height: 35px; width: 35px; position: absolute; top: 8px; left: 17px" src="helmets/ohio.jpg">
        <p class="website_name">HSF<span style="color:#d6d6d6">CHALLENGE</span></p></a>
    <div id="profile_wrap">
        <ul>
            <li><img style="height: 22px; width: 22px; position: absolute; left:1000px" src="helmets/profile_b48.png"></li>
            <li style="left: 1029px; cursor:pointer; color: #007AC3">Welcome, <?php echo htmlentities($name[0]);?> <b class="caret"></b>
                <ul>
                  <li><a href="#">Account Settings</a></li>
                  <li><a href="sign_out.php">Sign Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="bracket_create">
	<form action="" method="POST">
		Name your bracket:
		<input type="text" name="brackName" placeholder="Bracket name" maxlength="30">
		<br><br>
		Bracket type:
		<select name="div">
		  <option value="1">Div. 1</option>
		  <option value="2">Div. 2</option>
		  <option value="3">Div. 3</option>
		  <option value="4">Div. 4</option>
		  <option value="5">Div. 5</option>
		  <option value="6">Div. 6</option>
		  <option value="7">Div. 7</option>
		</select>
		<br><br>
		<input class="btn btn-primary btn-sm" style="position:absolute; left:20px; height: 28px" type="submit" value="Create Bracket" name="submit">
	</form>
	<?php
		if(isset($_POST["submit"])) {
			if(!empty($_POST['brackName'])) {
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

				$name=$_POST['brackName'];
				$div=$_POST['div'];

				$get_user_id="SELECT user_id FROM users WHERE email = '".$_SESSION["sess_user"]."'";
				$res=mysqli_query($con, $get_user_id);
				$id=mysqli_fetch_array($res);

				$get_email = "SELECT email FROM users WHERE email = '".$_SESSION["sess_user"]."'";
				$res5 = mysqli_query($con, $get_email);
				$email = mysqli_fetch_array($res5);

				$user_name = substr($email[0], 0, strpos($email[0], '@'));

				$sql="INSERT INTO user_brackets (user_id, username, bracket_name, bracket_type) VALUES (?, ?, ?, ?)";

				if ($stmt = $con->prepare($sql)) {
					$stmt->bind_param("sssi", $id[0], $user_name, $name, $div);
					if ($stmt->execute()) {

						$name_w_escape = mysqli_real_escape_string($con, $name);

						$get_bracket_id = "SELECT bracket_id FROM user_brackets WHERE bracket_name = '$name_w_escape' AND user_id = $id[0]";
						$res3 = mysqli_query($con, $get_bracket_id);
						$brack_id = mysqli_fetch_array($res3);

						$sql2="INSERT INTO brackets (bracket_id) VALUES (?)";

						if ($stmt2 = $con->prepare($sql2)) {
							$stmt2->bind_param("s", $brack_id[0]);
							if ($stmt2->execute()) {
								$stmt2->close();
								header("Location: bracket2.php?bracket_id=$brack_id[0]");
							} else {
								echo "<br>Error2";
							}
						}
					} else {
						echo "<br>Error";
					}					
				} else {
					echo "<br>Could not connect to Database";
				}
			} else {
				echo "<br>Must have a bracket name!";
			}
		}			
	?>
</div>
</body>
</html>