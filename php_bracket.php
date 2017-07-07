<?php
$session_set = true;
if(!isset($_SESSION["sess_user"])){
    $session_set = false;
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

if ($session_set) {
	$getNameAndID = "SELECT username,user_id FROM users WHERE email = '".$_SESSION["sess_user"]."'";
	$res2 = mysqli_query($con, $getNameAndID);
	$name_user_id = mysqli_fetch_array($res2);

	$getID = "SELECT user_id FROM users WHERE email = '".$_SESSION["sess_user"]."'";
	$res3 = mysqli_query($con, $getID);
	$id = mysqli_fetch_array($res3);

	$getName = "SELECT username FROM users WHERE email = '".$_SESSION["sess_user"]."'";
	$res4 = mysqli_query($con, $getName);
	$name = mysqli_fetch_array($res4);
}

$id_bracket = $_GET["bracket_id"];

$get_bracket_name = "SELECT bracket_name FROM user_brackets WHERE bracket_id = $id_bracket";
$res7 = mysqli_query($con, $get_bracket_name);
$bracket_name = mysqli_fetch_array($res7);

if($bracket_name != null) {
	$get_bracket_div = "SELECT bracket_type FROM user_brackets WHERE bracket_id = $id_bracket";
	$res8 = mysqli_query($con, $get_bracket_div);
	$bracket_div = mysqli_fetch_array($res8);
} else {
	printf("<script>location.href='user_home.php'</script>");
}

$getTeams = "SELECT * FROM d1_teams ORDER BY `seed` ASC";
$res = mysqli_query($con, $getTeams);
while($row = mysqli_fetch_array($res)) {
	$teams[] = $row["team_name"];
}

$getWinners = "SELECT winner0, winner1, winner2, winner3, winner4, winner5, winner6, winner7, winner8, winner9, winner10, winner11, winner12, winner13, 
						winner14, winner15, winner16, winner17, winner18, winner19, winner20, winner21, winner22, winner23, winner24, winner25, 
						winner26, winner27, winner28, winner29, winner30, winner31 FROM brackets WHERE bracket_id = $id_bracket";
$res5 = mysqli_query($con, $getWinners);
$winner = mysqli_fetch_array($res5);

$id_master_bracket = 24;
$getMasterBracket = "SELECT winner0, winner1, winner2, winner3, winner4, winner5, winner6, winner7, winner8, winner9, winner10, winner11, winner12, winner13, 
						winner14, winner15, winner16, winner17, winner18, winner19, winner20, winner21, winner22, winner23, winner24, winner25, 
						winner26, winner27, winner28, winner29, winner30, winner31 FROM brackets WHERE bracket_id = $id_master_bracket";
$res8 = mysqli_query($con, $getMasterBracket);
$master_bracket = mysqli_fetch_array($res8);

$k = 1;
$winners_numeric = array();
$master_bracket_numeric = array();
while($k < 32) {
	array_push($winners_numeric, $winner[$k]);
	array_push($master_bracket_numeric, $master_bracket[$k]);
	$k++;
}
?>