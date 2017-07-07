<?php
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location: home.php");
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
$res2 = mysqli_query($con, $getName);
$name = mysqli_fetch_array($res2);

$id_bracket = $_GET["bracket_id"];

$get_bracket_name = "SELECT bracket_name FROM user_brackets WHERE bracket_id = $id_bracket";
$res7 = mysqli_query($con, $get_bracket_name);
$bracket_name = mysqli_fetch_array($res7);

$get_bracket_div = "SELECT bracket_type FROM user_brackets WHERE bracket_id = $id_bracket";
$res8 = mysqli_query($con, $get_bracket_div);
$bracket_div = mysqli_fetch_array($res8);
?>

<html>
<head>
	<meta charset="utf-8">
	<title>HSFC</title>
	<link href="css/HSFM.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
    		$(".divSelect").click(function(){
        		$(".divSelect").removeClass("activeBtn");
        		$(this).addClass("activeBtn");
    		});
		});
	</script>
	
</head>
<body onload="helmetToggle()"> <!-- put in body: onbeforeunload="return warnUser()"-->

<nav class="top_nav">
		<a href="user_home.php"><img style="height: 35px; width: 35px; position: absolute; top: 8px; left: 22px" src="helmets/ohio.jpg">
			<p class="website_name">HSF<span style="color:#d6d6d6">CHALLENGE</span></p></a>
		<div id="profile_wrap">
			<ul>
				<li><img style="height: 22px; width: 22px; position: absolute; left:971px" src="helmets/profile_b48.png"></li>
			  	<li style="left: 1000px; cursor:pointer; color: #007AC3">Welcome, <?php echo htmlentities($name[0]);?> <b class="caret"></b>
				    <ul>
				      <li><a href="#">Account Settings</a></li>
				      <li><a href="sign_out.php">Sign Out</a></li>
				    </ul>
			  	</li>
			</ul>
		</div>
</nav>

<div class="page">
	<div class="bracket_info">
		<div class="bracket_name">
			<p style="display:inline; background-color:#2b2e34; border-radius:5px">&nbsp;<?php echo htmlentities($bracket_name[0]);?>&nbsp;</p>
		</div>
		<div class="bracket_type">
			<p>Type: Division <?php echo htmlentities($bracket_div[0]);?></p>
		</div>
		<div class="bracket_groups">
			<p>Groups/Other info</p>
		</div>
	</div>

	<div class = "rounds">
		<h5 style="display:inline">&nbsp;<span style="background-color:#007AC3; color:#fff;top:10px; border-radius:5px">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;
			&nbsp;<span style="background-color:#007AC3; color:#fff;top:10px; border-radius:5px">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;
			&nbsp;<span style="background-color:#007AC3; color:#fff;top:10px; border-radius:5px">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;
			&nbsp;<span style="background-color:#007AC3; color:#fff;top:10px; border-radius:5px">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;</h5>
		<h5 style="display:inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;<span style="background-color:#007AC3; color:#fff;top:10px; border-radius:5px">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;
			&nbsp;<span style="background-color:#007AC3; color:#fff;top:10px; border-radius:5px">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;
			&nbsp;<span style="background-color:#007AC3; color:#fff;top:10px; border-radius:5px">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;
			&nbsp;<span style="background-color:#007AC3; color:#fff;top:10px; border-radius:5px">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;</h5>
	</div>

	<?php
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

	$getTeams = "SELECT * FROM d1_teams ORDER BY `seed` ASC";
	$res = mysqli_query($con, $getTeams);
	while($row = mysqli_fetch_array($res)) {
		$teams[] = $row["team_name"];
	}

	$getID = "SELECT user_id FROM users WHERE email = '".$_SESSION["sess_user"]."'";
	$res3 = mysqli_query($con, $getID);
	$id = mysqli_fetch_array($res3);

	$getWinners = "SELECT winner0, winner1, winner2, winner3, winner4, winner5, winner6, winner7, winner8, winner9, winner10, winner11, winner12, winner13, 
							winner14, winner15, winner16, winner17, winner18, winner19, winner20, winner21, winner22, winner23, winner24, winner25, 
							winner26, winner27, winner28, winner29, winner30, winner31 FROM brackets WHERE bracket_id = $id_bracket";
	$res5 = mysqli_query($con, $getWinners);
	$winner = mysqli_fetch_array($res5);

	$getName = "SELECT first_name FROM users WHERE email = '".$_SESSION["sess_user"]."'";
	$res4 = mysqli_query($con, $getName);
	$name = mysqli_fetch_array($res4);
	?>

	<div class="background">
		<div class="bracket tb" id="d1" style="display: block; margin-bottom: 0px">
		    <div summary="R1Lines">
	  	  	  <div class="bracket-line-vert" style="left:124px; top:14px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:14px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:47px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:30px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:91px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:91px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:124px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:107px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:168px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:168px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:201px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:184px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:245px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:245px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:278px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:261px">
			  </div>

			  <div class="bracket-line-vert" style="left:249px; top:30px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:30px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:108px">
			  </div>
			  <div class="bracket-line-horiz" style="left:250px; top:69px">
			  </div>

			  <div class="bracket-line-vert" style="left:249px; top:184px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:184px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:262px">
			  </div>
			  <div class="bracket-line-horiz" style="left:250px; top:223px">
			  </div>

			  <div class="bracket-line-vert" style="left:374px; top:69px; height:155px">
			  </div>
			  <div class="bracket-line-horiz" style="left:369px; top:69px">
			  </div>
			  <div class="bracket-line-horiz" style="left:369px; top:224px">
			  </div>
			  <div class="bracket-line-horiz" style="left:375px; top:146px">
			  </div>

			  <div class="bracket-line-vert" style="left:499px; top:146px; height:308px">
			  </div>
			  <div class="bracket-line-horiz" style="left:494px; top:146px">
			  </div>
			  <div class="bracket-line-horiz" style="left:494px; top:454px">
			  </div>
			  <div class="bracket-line-horiz" style="left:500px; top:292px">
			  </div>

			  <div class="bracket-line-horiz" style="left:619px; top:292px; width:12px">
			  </div>
			</div>
			<div summary="R2Lines">
			  <div class="bracket-line-vert" style="left:124px; top:322px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:322px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:355px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:338px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:399px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:399px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:432px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:415px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:476px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:476px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:509px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:492px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:553px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:553px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:586px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:569px">
			  </div>

			  <div class="bracket-line-vert" style="left:249px; top:338px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:338px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:416px">
			  </div>
			  <div class="bracket-line-horiz" style="left:250px; top:377px">
			  </div>

			  <div class="bracket-line-vert" style="left:249px; top:492px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:492px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:570px">
			  </div>
			  <div class="bracket-line-horiz" style="left:250px; top:531px">
			  </div>

			  <div class="bracket-line-vert" style="left:374px; top:377px; height:155px">
			  </div>
			  <div class="bracket-line-horiz" style="left:369px; top:377px">
			  </div>
			  <div class="bracket-line-horiz" style="left:369px; top:532px">
			  </div>
			  <div class="bracket-line-horiz" style="left:375px; top:454px">
			  </div>
			</div>
			<div summary="R3Lines">
			  <div class="bracket-line-vert" style="right:124px; top:14px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:14px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:47px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:30px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:91px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:91px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:124px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:107px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:168px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:168px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:201px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:184px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:245px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:245px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:278px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:261px">
			  </div>

			  <div class="bracket-line-vert" style="right:249px; top:30px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:30px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:108px">
			  </div>
			  <div class="bracket-line-horiz" style="right:250px; top:69px">
			  </div>

			  <div class="bracket-line-vert" style="right:249px; top:184px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:184px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:262px">
			  </div>
			  <div class="bracket-line-horiz" style="right:250px; top:223px">
			  </div>

			  <div class="bracket-line-vert" style="right:374px; top:69px; height:155px">
			  </div>
			  <div class="bracket-line-horiz" style="right:369px; top:69px">
			  </div>
			  <div class="bracket-line-horiz" style="right:369px; top:224px">
			  </div>
			  <div class="bracket-line-horiz" style="right:375px; top:146px">
			  </div>

			  <div class="bracket-line-vert" style="right:499px; top:146px; height:308px">
			  </div>
			  <div class="bracket-line-horiz" style="right:494px; top:146px">
			  </div>
			  <div class="bracket-line-horiz" style="right:494px; top:454px">
			  </div>
			  <div class="bracket-line-horiz" style="right:500px; top:292px">
			  </div>
			</div>
			<div summary="R4Lines">
			  <div class="bracket-line-vert" style="right:124px; top:322px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:322px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:355px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:338px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:399px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:399px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:432px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:415px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:476px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:476px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:509px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:492px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:553px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:553px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:586px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:569px">
			  </div>

			  <div class="bracket-line-vert" style="right:249px; top:338px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:338px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:416px">
			  </div>
			  <div class="bracket-line-horiz" style="right:250px; top:377px">
			  </div>

			  <div class="bracket-line-vert" style="right:249px; top:492px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:492px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:570px">
			  </div>
			  <div class="bracket-line-horiz" style="right:250px; top:531px">
			  </div>

			  <div class="bracket-line-vert" style="right:374px; top:377px; height:155px">
			  </div>
			  <div class="bracket-line-horiz" style="right:369px; top:377px">
			  </div>
			  <div class="bracket-line-horiz" style="right:369px; top:532px">
			  </div>
			  <div class="bracket-line-horiz" style="right:375px; top:454px">
			  </div>
			</div>

			<h1 class="region_label" style="left:293px">Region 1</h1>
			<h1 class="region_label" style="left:808px">Region 2</h1>
			<h5 class="state_final_label" style="left:563px">State Championship</h5>


		    <form action="" method="POST" onsubmit="setHidden()">
				<input readonly="readonly" class="champ" id="champion" name="winner31" value="<?php echo htmlentities($winner[31]);?>">
				<p class="champ_text">Champion</p>
				<img class="helmet1" id="champ1" style="display:none" src="helmets/Westerville Central.png">
				<img class="helmet2" id="champ2" style="display:none" src="helmets/wadsworth.png">
				<img class="helmet3" id="champ3" style="display:none" src="helmets/Hudson.png">
				<div summary="Hidden forms">
					<input class="hidden_form" style="position:absolute; display:none" name="winner1" id="hiddenWinner1" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner2" id="hiddenWinner2" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner3" id="hiddenWinner3" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner4" id="hiddenWinner4" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner5" id="hiddenWinner5" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner6" id="hiddenWinner6" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner7" id="hiddenWinner7" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner8" id="hiddenWinner8" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner9" id="hiddenWinner9" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner10" id="hiddenWinner10" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner11" id="hiddenWinner11" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner12" id="hiddenWinner12" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner13" id="hiddenWinner13" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner14" id="hiddenWinner14" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner15" id="hiddenWinner15" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner16" id="hiddenWinner16" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner17" id="hiddenWinner17" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner18" id="hiddenWinner18" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner19" id="hiddenWinner19" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner20" id="hiddenWinner20" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner21" id="hiddenWinner21" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner22" id="hiddenWinner22" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner23" id="hiddenWinner23" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner24" id="hiddenWinner24" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner25" id="hiddenWinner25" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner26" id="hiddenWinner26" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner27" id="hiddenWinner27" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner28" id="hiddenWinner28" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner29" id="hiddenWinner29" value="k">
					<input class="hidden_form" style="position:absolute; display:none" name="winner30" id="hiddenWinner30" value="k">
				</div>
			
				<table summary="Div 1 Tournament Bracket">
			 		<tr>
			  			<td><input id="team1" type="button" onclick="advanceTeam('rd2winner1', this.id)" value="1&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[1]);?>"></td>
			  			<td rowspan="2"><input id="rd2winner1" type="button" name="winner1" onclick="advanceTeam('rd3winner1', this.id)" value="<?php echo htmlentities($winner[1]);?>"></td>
			  			<td rowspan="4"><input id="rd3winner1" type="button" name="winner17" onclick="advanceTeam('rd4winner1', this.id)" value="<?php echo htmlentities($winner[17]);?>"></td>
			  			<td rowspan="8"><input id="rd4winner1" type="button" name="winner25" onclick="advanceTeam('rd5winner1', this.id)" value="<?php echo htmlentities($winner[25]);?>"></td>
			  			<td rowspan="16"><input id="rd5winner1" type="button" name="winner29" onclick="advanceTeam('champion', this.id)" value="<?php echo htmlentities($winner[29]);?>">&nbsp;</td>
			  			<td rowspan="16"><input id="rd5winner2" type="button" name="winner30" onclick="advanceTeam('champion', this.id)" value="<?php echo htmlentities($winner[30]);?>">&nbsp;</td>
			  			<td rowspan="8"><input id="rd4winner3" type="button" name="winner27" onclick="advanceTeam('rd5winner2', this.id)" value="<?php echo htmlentities($winner[27]);?>"></td>
			  			<td rowspan="4"><input id="rd3winner5" type="button" name="winner21" onclick="advanceTeam('rd4winner3', this.id)" value="<?php echo htmlentities($winner[21]);?>"></td>
			  			<td rowspan="2"><input id="rd2winner9" type="button" name="winner9" onclick="advanceTeam('rd3winner5', this.id)" value="<?php echo htmlentities($winner[9]);?>"></td>
			  			<td><input id="team17" type="button" onclick="advanceTeam('rd2winner9', this.id)" value="1&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+1]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td><input id="team16" type="button" onclick="advanceTeam('rd2winner1', this.id, 'hiddenWinner1')" value="16&nbsp;<?php echo htmlentities($teams[16]);?>"></td>
			  			<td><input id="team32" type="button" onclick="advanceTeam('rd2winner9', this.id)" value="16&nbsp;<?php echo htmlentities($teams[16+16]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td>&nbsp;<input id="team8" type="button" onclick="advanceTeam('rd2winner2', this.id)" value="8&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[8]);?>"></td>
			  			<td rowspan="2">&nbsp;<input id="rd2winner2" type="button" name="winner2" onclick="advanceTeam('rd3winner1', this.id)" value="<?php echo htmlentities($winner[2]);?>"></td>
			  			<td rowspan="2">&nbsp;<input id="rd2winner10" type="button" name="winner10" onclick="advanceTeam('rd3winner5', this.id)" value="<?php echo htmlentities($winner[10]);?>"></td>
			  			<td>&nbsp;<input id="team24" type="button" onclick="advanceTeam('rd2winner10', this.id)" value="8&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+8]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td><input id="team9" type="button" onclick="advanceTeam('rd2winner2', this.id)" value="9&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[9]);?>"></td>
			  			<td><input id="team25" type="button" onclick="advanceTeam('rd2winner10', this.id)" value="9&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+9]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td>&nbsp;<input id="team5" type="button" onclick="advanceTeam('rd2winner3', this.id)" value="5&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[5]);?>"></td>
			  			<td rowspan="2">&nbsp;<input id="rd2winner3" type="button" name="winner3" onclick="advanceTeam('rd3winner2', this.id)" value="<?php echo htmlentities($winner[3]);?>"></td>
			  			<td rowspan="4">&nbsp;<input id="rd3winner2" type="button" name="winner18" onclick="advanceTeam('rd4winner1', this.id)" value="<?php echo htmlentities($winner[18]);?>"></td>
			  			<td rowspan="4">&nbsp;<input id="rd3winner6" type="button" name="winner22" onclick="advanceTeam('rd4winner3', this.id)" value="<?php echo htmlentities($winner[22]);?>"></td>
			  			<td rowspan="2">&nbsp;<input id="rd2winner11" type="button" name="winner11" onclick="advanceTeam('rd3winner6', this.id)" value="<?php echo htmlentities($winner[11]);?>"></td>
			  			<td>&nbsp;<input id="team21" type="button" onclick="advanceTeam('rd2winner11', this.id)" value="5&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+5]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td><input id="team12" type="button" onclick="advanceTeam('rd2winner3', this.id)" value="12&nbsp;<?php echo htmlentities($teams[12]);?>"></td>
			  			<td><input id="team28" type="button" onclick="advanceTeam('rd2winner11', this.id)" value="12&nbsp;<?php echo htmlentities($teams[16+12]);?>"></td>
			 		</tr>
			 		<tr>
					  	<td>&nbsp;<input id="team4" type="button" onclick="advanceTeam('rd2winner4', this.id)" value="4&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[4]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner4" type="button" name="winner4" onclick="advanceTeam('rd3winner2', this.id)" value="<?php echo htmlentities($winner[4]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner12" type="button" name="winner12" onclick="advanceTeam('rd3winner6', this.id)" value="<?php echo htmlentities($winner[12]);?>"></td>
					  	<td>&nbsp;<input id="team20" type="button" onclick="advanceTeam('rd2winner12', this.id)" value="4&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+4]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team13" type="button" onclick="advanceTeam('rd2winner4', this.id)" value="13&nbsp;<?php echo htmlentities($teams[13]);?>"></td>
					  	<td><input id="team29" type="button" onclick="advanceTeam('rd2winner12', this.id)" value="13&nbsp;<?php echo htmlentities($teams[16+13]);?>"></td>
					 </tr>
					 <tr>
					  	<td>&nbsp;<input id="team6" type="button"onclick="advanceTeam('rd2winner5', this.id)" value="6&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[6]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner5" type="button" name="winner5" onclick="advanceTeam('rd3winner3', this.id)" value="<?php echo htmlentities($winner[5]);?>"></td>
					  	<td rowspan="4">&nbsp;<input id="rd3winner3" type="button" name="winner19" onclick="advanceTeam('rd4winner2', this.id)" value="<?php echo htmlentities($winner[19]);?>"></td>
					  	<td rowspan="8">&nbsp;<input id="rd4winner2" type="button" name="winner26" onclick="advanceTeam('rd5winner1', this.id)" value="<?php echo htmlentities($winner[26]);?>"></td>
					  	<td rowspan="8">&nbsp;<input id="rd4winner4" type="button" name="winner28" onclick="advanceTeam('rd5winner2', this.id)" value="<?php echo htmlentities($winner[28]);?>"></td>
					  	<td rowspan="4">&nbsp;<input id="rd3winner7" type="button" name="winner23" onclick="advanceTeam('rd4winner4', this.id)" value="<?php echo htmlentities($winner[23]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner13" type="button" name="winner13" onclick="advanceTeam('rd3winner7', this.id)" value="<?php echo htmlentities($winner[13]);?>"></td>
					  	<td>&nbsp;<input id="team22" type="button" onclick="advanceTeam('rd2winner13', this.id)" value="6&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+6]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team11" type="button" onclick="advanceTeam('rd2winner5', this.id)" value="11&nbsp;<?php echo htmlentities($teams[11]);?>"></td>
					  	<td><input id="team27" type="button" onclick="advanceTeam('rd2winner13', this.id)" value="11&nbsp;<?php echo htmlentities($teams[16+11]);?>"></td>
					 </tr>
					 <tr>
					  	<td>&nbsp;<input id="team3" type="button" onclick="advanceTeam('rd2winner6', this.id)" value="3&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[3]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner6" type="button" name="winner6" onclick="advanceTeam('rd3winner3', this.id)" value="<?php echo htmlentities($winner[6]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner14" type="button" name="winner14" onclick="advanceTeam('rd3winner7', this.id)" value="<?php echo htmlentities($winner[14]);?>"></td>
					  	<td>&nbsp;<input id="team19" type="button" onclick="advanceTeam('rd2winner14', this.id)" value="3&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+3]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team14" type="button" onclick="advanceTeam('rd2winner6', this.id)" value="14&nbsp;<?php echo htmlentities($teams[14]);?>"></td>
					  	<td><input id="team30" type="button" onclick="advanceTeam('rd2winner14', this.id)" value="14&nbsp;<?php echo htmlentities($teams[16+14]);?>"></td>
					 </tr>
					 <tr>
					  	<td>&nbsp;<input id="team7" type="button" onclick="advanceTeam('rd2winner7', this.id)" value="7&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[7]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner7" type="button" name="winner7" onclick="advanceTeam('rd3winner4', this.id)" value="<?php echo htmlentities($winner[7]);?>"></td>
					  	<td rowspan="4">&nbsp;<input id="rd3winner4" type="button" name="winner20" onclick="advanceTeam('rd4winner2', this.id)" value="<?php echo htmlentities($winner[20]);?>"></td>
					  	<td rowspan="4">&nbsp;<input id="rd3winner8" type="button" name="winner24" onclick="advanceTeam('rd4winner4', this.id)" value="<?php echo htmlentities($winner[24]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner15" type="button" name="winner15" onclick="advanceTeam('rd3winner8', this.id)" value="<?php echo htmlentities($winner[15]);?>"></td>
					  	<td>&nbsp;<input id="team23" type="button" onclick="advanceTeam('rd2winner15', this.id)" value="7&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+7]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team10" type="button" onclick="advanceTeam('rd2winner7', this.id)" value="10&nbsp;<?php echo htmlentities($teams[10]);?>"></td>
					  	<td><input id="team26" type="button" onclick="advanceTeam('rd2winner15', this.id)" value="10&nbsp;<?php echo htmlentities($teams[16+10]);?>"></td>
					 </tr>
					 <tr>
					  	<td>&nbsp;<input id="team2" type="button" onclick="advanceTeam('rd2winner8', this.id)" value="2&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[2]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner8" type="button" name="winner8" onclick="advanceTeam('rd3winner4', this.id)" value="<?php echo htmlentities($winner[8]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner16" type="button" name="winner16" onclick="advanceTeam('rd3winner8', this.id)" value="<?php echo htmlentities($winner[16]);?>"></td>
					  	<td>&nbsp;<input id="team18" type="button" onclick="advanceTeam('rd2winner16', this.id)" value="2&nbsp;&nbsp;&nbsp;<?php echo htmlentities($teams[16+2]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team15" type="button" onclick="advanceTeam('rd2winner8', this.id)" value="15&nbsp;<?php echo htmlentities($teams[15]);?>"></td>
					  	<td><input id="team31" type="button" onclick="advanceTeam('rd2winner16', this.id)" value="15&nbsp;<?php echo htmlentities($teams[16+15]);?>"></td>
					 </tr>
				</table>
				<input class="submit" type="submit" value="Submit" name="submit">
		    </form> 
		</div>

		<?php
			if(isset($_POST["submit"])) {
			  if(isset($_POST)) {
				$winner1=$_POST['winner1'];
				$winner2=$_POST['winner2'];
				$winner3=$_POST['winner3'];
				$winner4=$_POST['winner4'];
				$winner5=$_POST['winner5'];
				$winner6=$_POST['winner6'];
				$winner7=$_POST['winner7'];
				$winner8=$_POST['winner8'];
				$winner9=$_POST['winner9'];
				$winner10=$_POST['winner10'];
				$winner11=$_POST['winner11'];
				$winner12=$_POST['winner12'];
				$winner13=$_POST['winner13'];
				$winner14=$_POST['winner14'];
				$winner15=$_POST['winner15'];
				$winner16=$_POST['winner16'];
				$winner17=$_POST['winner17'];
				$winner18=$_POST['winner18'];
				$winner19=$_POST['winner19'];
				$winner20=$_POST['winner20'];
				$winner21=$_POST['winner21'];
				$winner22=$_POST['winner22'];
				$winner23=$_POST['winner23'];
				$winner24=$_POST['winner24'];
				$winner25=$_POST['winner25'];
				$winner26=$_POST['winner26'];
				$winner27=$_POST['winner27'];
				$winner28=$_POST['winner28'];
				$winner29=$_POST['winner29'];
				$winner30=$_POST['winner30'];
				$winner31=$_POST['winner31'];

				$email=$_SESSION["sess_user"];

				$con = new mysqli($servername, $username, $password);
				if ($con->connect_error) {
			    	die("Connection failed: " . $con->connect_error);
				}
				if (!mysqli_select_db($con, "hsfm"))  {  
			  		echo "Unable to locate the database";   
			  		exit();  
				}

				$sql="UPDATE `hsfm`.`brackets` SET `winner1` = '$winner1', `winner2` = '$winner2', `winner3` = '$winner3', `winner4` = '$winner4',
													`winner5` = '$winner5', `winner6` = '$winner6', `winner7` = '$winner7', `winner8` = '$winner8', 
													`winner9` = '$winner9', `winner10` = '$winner10', `winner11` = '$winner11', `winner12` = '$winner12',
													`winner13` = '$winner13', `winner14` = '$winner14', `winner15` = '$winner15', `winner16` = '$winner16',
													`winner17` = '$winner17', `winner18` = '$winner18', `winner19` = '$winner19', `winner20` = '$winner20',
													`winner21` = '$winner21', `winner22` = '$winner22', `winner23` = '$winner23', `winner24` = '$winner24',
													`winner25` = '$winner25', `winner26` = '$winner26', `winner27` = '$winner27', `winner28` = '$winner28',
													`winner29` = '$winner29', `winner30` = '$winner30', `winner31` = '$winner31' WHERE bracket_id = $id_bracket";
				$res6=mysqli_query($con, $sql);

				if($res6) {
					echo "Submit Successful";
					printf("<script>location.href='bracket.php?bracket_id=$id_bracket'</script>");
				} else {
					echo "Error1";
				}
			  } else {
			  	 echo "Error2";
			  }
			}
		?>		
	</div>
	
	<script> function advanceTeam(id1, id2) {
		if (parseInt(document.getElementById(id2).value) > 0) {
			if(parseInt(document.getElementById(id1).value) > 0 && document.getElementById(id1).value != document.getElementById(id2).value) {
				var team = document.getElementById(id1).value;
				clearFields(team, id1);
			}
			document.getElementById(id1).value = document.getElementById(id2).value;
		}
		helmetToggle();
	}
	</script>
	<script> function warnUser() {
		return "Warning: Any unsaved changes will be lost";
	}
	</script>

	<script> function helmetToggle() {
		if(parseInt(document.getElementById("rd5winner1").value) > 0) {
			var n = parseInt(document.getElementById("rd5winner1").value);
			var str = document.getElementById("rd5winner1").value;
			if (n < 10) {
				var res = str.substring(4,20);
			} else {
				var res = str.substring(3,20);
			}
			document.getElementById("champ1").src = "helmets/" + res + ".png";
			document.getElementById("champ1").style.display = "block";
		} else {
			document.getElementById("champ1").style.display = "none";
		}

		if(parseInt(document.getElementById("rd5winner2").value) > 0) {
			var m = parseInt(document.getElementById("rd5winner2").value);
			var str2 = document.getElementById("rd5winner2").value;
			if (m < 10) {
				var res2 = str2.substring(4,20);
			} else {
				var res2 = str2.substring(3,20);
			}
			document.getElementById("champ2").src = "helmets/" + res2 + ".png";
			document.getElementById("champ2").style.display = "block";
		} else {
			document.getElementById("champ2").style.display = "none";
		}

		if(parseInt(document.getElementById("champion").value) > 0) {
			var p = parseInt(document.getElementById("champion").value);
			var str3 = document.getElementById("champion").value;
			if (p < 10) {
				var res3 = str3.substring(4,20);
			} else {
				var res3 = str3.substring(3,20);
			}
			document.getElementById("champ3").src = "helmets/" + res3 + ".png";
			document.getElementById("champ3").style.display = "block";
		} else {
			document.getElementById("champ3").style.display = "none";
		}
	}
	</script>

	<script> function setHidden() {
		document.getElementById("hiddenWinner1").value = document.getElementById("rd2winner1").value;
		document.getElementById("hiddenWinner2").value = document.getElementById("rd2winner2").value;
		document.getElementById("hiddenWinner3").value = document.getElementById("rd2winner3").value;
		document.getElementById("hiddenWinner4").value = document.getElementById("rd2winner4").value;
		document.getElementById("hiddenWinner5").value = document.getElementById("rd2winner5").value;
		document.getElementById("hiddenWinner6").value = document.getElementById("rd2winner6").value;
		document.getElementById("hiddenWinner7").value = document.getElementById("rd2winner7").value;
		document.getElementById("hiddenWinner8").value = document.getElementById("rd2winner8").value;
		document.getElementById("hiddenWinner9").value = document.getElementById("rd2winner9").value;
		document.getElementById("hiddenWinner10").value = document.getElementById("rd2winner10").value;
		document.getElementById("hiddenWinner11").value = document.getElementById("rd2winner11").value;
		document.getElementById("hiddenWinner12").value = document.getElementById("rd2winner12").value;
		document.getElementById("hiddenWinner13").value = document.getElementById("rd2winner13").value;
		document.getElementById("hiddenWinner14").value = document.getElementById("rd2winner14").value;
		document.getElementById("hiddenWinner15").value = document.getElementById("rd2winner15").value;
		document.getElementById("hiddenWinner16").value = document.getElementById("rd2winner16").value;
		document.getElementById("hiddenWinner17").value = document.getElementById("rd3winner1").value;
		document.getElementById("hiddenWinner18").value = document.getElementById("rd3winner2").value;
		document.getElementById("hiddenWinner19").value = document.getElementById("rd3winner3").value;
		document.getElementById("hiddenWinner20").value = document.getElementById("rd3winner4").value;
		document.getElementById("hiddenWinner21").value = document.getElementById("rd3winner5").value;
		document.getElementById("hiddenWinner22").value = document.getElementById("rd3winner6").value;
		document.getElementById("hiddenWinner23").value = document.getElementById("rd3winner7").value;
		document.getElementById("hiddenWinner24").value = document.getElementById("rd3winner8").value;
		document.getElementById("hiddenWinner25").value = document.getElementById("rd4winner1").value;
		document.getElementById("hiddenWinner26").value = document.getElementById("rd4winner2").value;
		document.getElementById("hiddenWinner27").value = document.getElementById("rd4winner3").value;
		document.getElementById("hiddenWinner28").value = document.getElementById("rd4winner4").value;
		document.getElementById("hiddenWinner29").value = document.getElementById("rd5winner1").value;
		document.getElementById("hiddenWinner30").value = document.getElementById("rd5winner2").value;
		document.getElementById("hiddenWinner31").value = document.getElementById("champion").value;
	}
	</script>

	<script> function clearFields(val, id) {
		var rd = parseInt(id[2]);
		var num1 = 6;
		var num2 = 5;

		while (num1 > rd) {
			switch(val) {
				case document.getElementById("champion").value:				
					document.getElementById("champion").value = "\u00a0";
					num1--;
					break;
				case document.getElementById("rd5winner1").value:
					document.getElementById("rd5winner1").value = "\u00a0";
					num1 = 4;
					break;
				case document.getElementById("rd4winner1").value:
					document.getElementById("rd4winner1").value = "\u00a0";
					num1 = 3;
					break;
				case document.getElementById("rd4winner2").value:
					document.getElementById("rd4winner2").value = "\u00a0";
					num1 = 3;
					break;
				case document.getElementById("rd3winner1").value:
					document.getElementById("rd3winner1").value = "\u00a0";
					num1 = 2;
					break;
				case document.getElementById("rd3winner2").value:
					document.getElementById("rd3winner2").value = "\u00a0";
					num1 = 2;
					break;
				case document.getElementById("rd3winner3").value:
					document.getElementById("rd3winner3").value = "\u00a0";
					num1 = 2;
					break;
				case document.getElementById("rd3winner4").value:
					document.getElementById("rd3winner4").value = "\u00a0";
					num1 = 2;
					break;
				default:
					num1 = 1;
			}
		}

		while (num2 > rd) {
			switch(val) {
				case document.getElementById("rd5winner2").value:
					document.getElementById("rd5winner2").value = "\u00a0";
					num2 = 4;
					break;
				case document.getElementById("rd4winner3").value:
					document.getElementById("rd4winner3").value = "\u00a0";
					num2 = 3;
					break;
				case document.getElementById("rd4winner4").value:
					document.getElementById("rd4winner4").value = "\u00a0";
					num2 = 3;
					break;
				case document.getElementById("rd3winner5").value:
					document.getElementById("rd3winner5").value = "\u00a0";
					num2 = 2;
					break;
				case document.getElementById("rd3winner6").value:
					document.getElementById("rd3winner6").value = "\u00a0";
					num2 = 2;
					break;
				case document.getElementById("rd3winner7").value:
					document.getElementById("rd3winner7").value = "\u00a0";
					num2 = 2;
					break;
				case document.getElementById("rd3winner8").value:
					document.getElementById("rd3winner8").value = "\u00a0";
					num2 = 2;
					break;
				default:
					num2 = 1;
			}
		}
		
	}
	</script>
</div>
</body>
</html>