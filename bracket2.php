<?php
session_start();
ob_start();
include 'php_bracket.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HSFC</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_bracket.css">	
</head>
<body onload="do_this()"> <!-- put in body: onbeforeunload="return warnUser()"-->

	<nav class="navbar navbar-inverse" style="margin-bottom: 0; border-radius: 0;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border-color: #194775;">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand logo" href="user_home.php">HSF<span style="color: #d6d6d6;">CHALLENGE</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">

            <?php
                if ($session_set) {
                    echo '<li><a class="no_highlight" href="#"><span class="glyphicon glyphicon-user" style="margin-right: 7px;"></span>'.$name_user_id[0].' | My Account</a></li>';
                    echo '<li><a class="no_highlight" href="sign_out.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                } else {
                    echo '<li><a class="no_highlight" href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login / Register</a></li>';
                }
            ?>
                       
          </ul>
        </div>
      </div>
    </nav>

<div class="page">
	<div class="bracket_info">
		<div class="bracket_name">
			<p style="display:inline; background-color:#2b2e34; border-radius:5px;">&nbsp;<?php echo htmlentities($bracket_name[0]);?>&nbsp;</p>
		</div>
		<div class="bracket_type">
			<p>Type: Division <?php echo htmlentities($bracket_div[0]);?></p>
		</div>
		<div class="bracket_groups">
			<p>Groups/Other info</p>
		</div>
	</div>

	

	<div class="background" style="padding: 10px 0; border-radius: 3px;">
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

			  <div class="bracket-line-horiz" style="left:619px; top:312px; width:12px; background-color: #005588">
			  </div>
			</div>
			<div summary="R2Lines">
			  <div class="bracket-line-vert" style="left:124px; top:362px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:362px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:395px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:378px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:439px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:439px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:472px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:455px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:516px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:516px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:549px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:532px">
			  </div>

			  <div class="bracket-line-vert" style="left:124px; top:593px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:593px">
			  </div>
			  <div class="bracket-line-horiz" style="left:119px; top:626px">
			  </div>
			  <div class="bracket-line-horiz" style="left:125px; top:609px">
			  </div>

			  <div class="bracket-line-vert" style="left:249px; top:378px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:378px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:456px">
			  </div>
			  <div class="bracket-line-horiz" style="left:250px; top:417px">
			  </div>

			  <div class="bracket-line-vert" style="left:249px; top:532px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:532px">
			  </div>
			  <div class="bracket-line-horiz" style="left:244px; top:610px">
			  </div>
			  <div class="bracket-line-horiz" style="left:250px; top:571px">
			  </div>

			  <div class="bracket-line-vert" style="left:374px; top:417px; height:155px">
			  </div>
			  <div class="bracket-line-horiz" style="left:369px; top:417px">
			  </div>
			  <div class="bracket-line-horiz" style="left:369px; top:572px">
			  </div>
			  <div class="bracket-line-horiz" style="left:375px; top:494px">
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
			</div>
			<div summary="R4Lines">
			  <div class="bracket-line-vert" style="right:124px; top:362px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:362px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:395px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:378px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:439px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:439px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:472px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:455px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:516px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:516px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:549px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:532px">
			  </div>

			  <div class="bracket-line-vert" style="right:124px; top:593px; height:33px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:593px">
			  </div>
			  <div class="bracket-line-horiz" style="right:119px; top:626px">
			  </div>
			  <div class="bracket-line-horiz" style="right:125px; top:609px">
			  </div>

			  <div class="bracket-line-vert" style="right:249px; top:378px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:378px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:456px">
			  </div>
			  <div class="bracket-line-horiz" style="right:250px; top:417px">
			  </div>

			  <div class="bracket-line-vert" style="right:249px; top:532px; height:78px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:532px">
			  </div>
			  <div class="bracket-line-horiz" style="right:244px; top:610px">
			  </div>
			  <div class="bracket-line-horiz" style="right:250px; top:571px">
			  </div>

			  <div class="bracket-line-vert" style="right:374px; top:417px; height:155px">
			  </div>
			  <div class="bracket-line-horiz" style="right:369px; top:417px">
			  </div>
			  <div class="bracket-line-horiz" style="right:369px; top:572px">
			  </div>
			  <div class="bracket-line-horiz" style="right:375px; top:494px">
			  </div>
			</div> 
			<div summary="FinalFourLines">
				<div class="bracket-line-vert" style="left:499px; top:293px; height:39px; background-color: #005588">
				</div>
				<div class="bracket-line-horiz" style="left:494px; top:293px; background-color: #005588">
				</div>
			 	<div class="bracket-line-horiz" style="left:494px; top:332px; background-color: #005588">
				</div>
				<div class="bracket-line-horiz" style="left:500px; top:312px; background-color: #005588">
				</div>

				<div class="bracket-line-vert" style="right:500px; top:293px; height:39px; background-color: #005588">
				</div>
				<div class="bracket-line-horiz" style="right:495px; top:293px; background-color: #005588">
				</div>
			 	<div class="bracket-line-horiz" style="right:495px; top:332px; background-color: #005588">
				</div>
				<div class="bracket-line-horiz" style="right:501px; top:312px; background-color: #005588">
				</div>
			</div>
			<div class="finals_box">
			</div>

			<h3 id="reg3" class="region_label_top" style="left:245px">Region 1</h3>
			<h3 id="reg4" class="region_label_bottom" style="left:245px">Region 2</h3>
			<h3 id="reg5" class="region_label_top" style="left:898px">Region 3</h3>
			<h3 id="reg6" class="region_label_bottom" style="left:898px">Region 4</h3>
			<h5 class="state_final_label" style="left:563px; top:268px; color:#fff">State Championship</h5>


		    <form action="" method="POST" onsubmit="setHidden()">
				<input readonly="readonly" class="champ" id="champion" name="winner31" value="<?php echo htmlentities($winner[31]);?>">
				<p class="champ_text">Champion</p>
				<img class="helmet1" id="champ1" style="display:none" src="">
				<img class="helmet2" id="champ2" style="display:none" src="">
				<img class="helmet3" id="champ3" style="display:none" src="">
				<img class="finals_lock" style="position: absolute; top:320px; left:602px; height:35px; width:46px" src="helmets/lock.png">
				<p style="position:absolute; top:347px; left:547px; font-weight:normal; color:black; font-size:12px">Unlocks when games are set</p>
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
				<input class="final_four_top" type="button" style="left: 375px; border-color: #005588" value="&nbsp;">
				<input class="final_four_top" type="button" style="left: 750px; border-color: #005588" value="&nbsp;">
				<input class="final_four_bottom" type="button" style="left: 375px; border-color: #005588" value="&nbsp;">
				<input class="final_four_bottom" type="button" style="left: 750px; border-color: #005588" value="&nbsp;">
			
				<table summary="Div 1-7 Tournament Bracket"> 
			 		<tr>
			  			<td><input id="team1" type="button" onclick="advanceTeam('rd2winner1', this.id)" value="1&nbsp;&nbsp;<?php echo htmlentities($teams[1]);?>"></td>
			  			<td rowspan="2"><input id="rd2winner1" type="button" name="winner1" onclick="advanceTeam('rd3winner1', this.id)" value="<?php echo htmlentities($winner[1]);?>"></td>
			  			<td rowspan="4"><input id="rd3winner1" type="button" name="winner17" onclick="advanceTeam('rd4winner1', this.id)" value="<?php echo htmlentities($winner[17]);?>"></td>
			  			<td rowspan="8"><input id="rd4winner1" type="button" name="winner25" onclick="advanceTeam('champion', this.id)" value="<?php echo htmlentities($winner[25]);?>"></td>
			  			<td rowspan="16"><input style="border-color: #005588" id="rd5winner1" type="button" name="winner29" onclick="advanceTeam('champion', this.id)" value="<?php echo htmlentities($winner[29]);?>">&nbsp;</td>
			  			<td rowspan="16"><input style="border-color: #005588" id="rd5winner2" type="button" name="winner30" onclick="advanceTeam('champion', this.id)" value="<?php echo htmlentities($winner[30]);?>">&nbsp;</td>
			  			<td rowspan="8"><input id="rd4winner3" type="button" name="winner27" onclick="advanceTeam('champion', this.id)" value="<?php echo htmlentities($winner[27]);?>"></td>
			  			<td rowspan="4"><input id="rd3winner5" type="button" name="winner21" onclick="advanceTeam('rd4winner3', this.id)" value="<?php echo htmlentities($winner[21]);?>"></td>
			  			<td rowspan="2"><input id="rd2winner9" type="button" name="winner9" onclick="advanceTeam('rd3winner5', this.id)" value="<?php echo htmlentities($winner[9]);?>"></td>
			  			<td><input id="team17" type="button" onclick="advanceTeam('rd2winner9', this.id)" value="1&nbsp;&nbsp;<?php echo htmlentities($teams[16+1]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td><input id="team16" type="button" onclick="advanceTeam('rd2winner1', this.id, 'hiddenWinner1')" value="8&nbsp;&nbsp;<?php echo htmlentities($teams[8]);?>"></td>
			  			<td><input id="team32" type="button" onclick="advanceTeam('rd2winner9', this.id)" value="8&nbsp;&nbsp;<?php echo htmlentities($teams[16+8]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td>&nbsp;<input id="team8" type="button" onclick="advanceTeam('rd2winner2', this.id)" value="4&nbsp;&nbsp;<?php echo htmlentities($teams[4]);?>"></td>
			  			<td rowspan="2">&nbsp;<input id="rd2winner2" type="button" name="winner2" onclick="advanceTeam('rd3winner1', this.id)" value="<?php echo htmlentities($winner[2]);?>"></td>
			  			<td rowspan="2">&nbsp;<input id="rd2winner10" type="button" name="winner10" onclick="advanceTeam('rd3winner5', this.id)" value="<?php echo htmlentities($winner[10]);?>"></td>
			  			<td>&nbsp;<input id="team24" type="button" onclick="advanceTeam('rd2winner10', this.id)" value="4&nbsp;&nbsp;<?php echo htmlentities($teams[16+4]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td><input id="team9" type="button" onclick="advanceTeam('rd2winner2', this.id)" value="5&nbsp;&nbsp;<?php echo htmlentities($teams[5]);?>"></td>
			  			<td><input id="team25" type="button" onclick="advanceTeam('rd2winner10', this.id)" value="5&nbsp;&nbsp;<?php echo htmlentities($teams[16+5]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td>&nbsp;<input id="team5" type="button" onclick="advanceTeam('rd2winner3', this.id)" value="3&nbsp;&nbsp;<?php echo htmlentities($teams[3]);?>"></td>
			  			<td rowspan="2">&nbsp;<input id="rd2winner3" type="button" name="winner3" onclick="advanceTeam('rd3winner2', this.id)" value="<?php echo htmlentities($winner[3]);?>"></td>
			  			<td rowspan="4">&nbsp;<input id="rd3winner2" type="button" name="winner18" onclick="advanceTeam('rd4winner1', this.id)" value="<?php echo htmlentities($winner[18]);?>"></td>
			  			<td rowspan="4">&nbsp;<input id="rd3winner6" type="button" name="winner22" onclick="advanceTeam('rd4winner3', this.id)" value="<?php echo htmlentities($winner[22]);?>"></td>
			  			<td rowspan="2">&nbsp;<input id="rd2winner11" type="button" name="winner11" onclick="advanceTeam('rd3winner6', this.id)" value="<?php echo htmlentities($winner[11]);?>"></td>
			  			<td>&nbsp;<input id="team21" type="button" onclick="advanceTeam('rd2winner11', this.id)" value="3&nbsp;&nbsp;<?php echo htmlentities($teams[16+3]);?>"></td>
			 		</tr>
			 		<tr>
			  			<td><input id="team12" type="button" onclick="advanceTeam('rd2winner3', this.id)" value="6&nbsp;&nbsp;<?php echo htmlentities($teams[6]);?>"></td>
			  			<td><input id="team28" type="button" onclick="advanceTeam('rd2winner11', this.id)" value="6&nbsp;&nbsp;<?php echo htmlentities($teams[16+6]);?>"></td>
			 		</tr>
			 		<tr>
					  	<td>&nbsp;<input id="team4" type="button" onclick="advanceTeam('rd2winner4', this.id)" value="2&nbsp;&nbsp;<?php echo htmlentities($teams[2]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner4" type="button" name="winner4" onclick="advanceTeam('rd3winner2', this.id)" value="<?php echo htmlentities($winner[4]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner12" type="button" name="winner12" onclick="advanceTeam('rd3winner6', this.id)" value="<?php echo htmlentities($winner[12]);?>"></td>
					  	<td>&nbsp;<input id="team20" type="button" onclick="advanceTeam('rd2winner12', this.id)" value="2&nbsp;&nbsp;<?php echo htmlentities($teams[16+2]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team13" type="button" onclick="advanceTeam('rd2winner4', this.id)" value="7&nbsp;&nbsp;<?php echo htmlentities($teams[7]);?>"></td>
					  	<td><input id="team29" type="button" onclick="advanceTeam('rd2winner12', this.id)" value="7&nbsp;&nbsp;<?php echo htmlentities($teams[16+7]);?>"></td>
					 </tr>
					 <tr>
					  	<td style="padding-top:40px">&nbsp;<input id="team6" type="button"onclick="advanceTeam('rd2winner5', this.id)" value="1&nbsp;&nbsp;<?php echo htmlentities($teams[8+1]);?>"></td>
					  	<td style="padding-top:40px" rowspan="2">&nbsp;<input id="rd2winner5" type="button" name="winner5" onclick="advanceTeam('rd3winner3', this.id)" value="<?php echo htmlentities($winner[5]);?>"></td>
					  	<td style="padding-top:40px" rowspan="4">&nbsp;<input id="rd3winner3" type="button" name="winner19" onclick="advanceTeam('rd4winner2', this.id)" value="<?php echo htmlentities($winner[19]);?>"></td>
					  	<td style="padding-top:40px" rowspan="8">&nbsp;<input id="rd4winner2" type="button" name="winner26" onclick="advanceTeam('champion', this.id)" value="<?php echo htmlentities($winner[26]);?>"></td>
					  	<td style="padding-top:40px" rowspan="8">&nbsp;<input id="rd4winner4" type="button" name="winner28" onclick="advanceTeam('champion', this.id)" value="<?php echo htmlentities($winner[28]);?>"></td>
					  	<td style="padding-top:40px" rowspan="4">&nbsp;<input id="rd3winner7" type="button" name="winner23" onclick="advanceTeam('rd4winner4', this.id)" value="<?php echo htmlentities($winner[23]);?>"></td>
					  	<td style="padding-top:40px" rowspan="2">&nbsp;<input id="rd2winner13" type="button" name="winner13" onclick="advanceTeam('rd3winner7', this.id)" value="<?php echo htmlentities($winner[13]);?>"></td>
					  	<td style="padding-top:40px">&nbsp;<input id="team22" type="button" onclick="advanceTeam('rd2winner13', this.id)" value="1&nbsp;&nbsp;<?php echo htmlentities($teams[24+1]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team11" type="button" onclick="advanceTeam('rd2winner5', this.id)" value="8&nbsp;&nbsp;<?php echo htmlentities($teams[8+8]);?>"></td>
					  	<td><input id="team27" type="button" onclick="advanceTeam('rd2winner13', this.id)" value="8&nbsp;&nbsp;<?php echo htmlentities($teams[24+8]);?>"></td>
					 </tr>
					 <tr>
					  	<td>&nbsp;<input id="team3" type="button" onclick="advanceTeam('rd2winner6', this.id)" value="4&nbsp;&nbsp;<?php echo htmlentities($teams[8+4]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner6" type="button" name="winner6" onclick="advanceTeam('rd3winner3', this.id)" value="<?php echo htmlentities($winner[6]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner14" type="button" name="winner14" onclick="advanceTeam('rd3winner7', this.id)" value="<?php echo htmlentities($winner[14]);?>"></td>
					  	<td>&nbsp;<input id="team19" type="button" onclick="advanceTeam('rd2winner14', this.id)" value="4&nbsp;&nbsp;<?php echo htmlentities($teams[24+4]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team14" type="button" onclick="advanceTeam('rd2winner6', this.id)" value="5&nbsp;&nbsp;<?php echo htmlentities($teams[8+5]);?>"></td>
					  	<td><input id="team30" type="button" onclick="advanceTeam('rd2winner14', this.id)" value="5&nbsp;&nbsp;<?php echo htmlentities($teams[24+5]);?>"></td>
					 </tr>
					 <tr>
					  	<td>&nbsp;<input id="team7" type="button" onclick="advanceTeam('rd2winner7', this.id)" value="3&nbsp;&nbsp;<?php echo htmlentities($teams[8+3]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner7" type="button" name="winner7" onclick="advanceTeam('rd3winner4', this.id)" value="<?php echo htmlentities($winner[7]);?>"></td>
					  	<td rowspan="4">&nbsp;<input id="rd3winner4" type="button" name="winner20" onclick="advanceTeam('rd4winner2', this.id)" value="<?php echo htmlentities($winner[20]);?>"></td>
					  	<td rowspan="4">&nbsp;<input id="rd3winner8" type="button" name="winner24" onclick="advanceTeam('rd4winner4', this.id)" value="<?php echo htmlentities($winner[24]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner15" type="button" name="winner15" onclick="advanceTeam('rd3winner8', this.id)" value="<?php echo htmlentities($winner[15]);?>"></td>
					  	<td>&nbsp;<input id="team23" type="button" onclick="advanceTeam('rd2winner15', this.id)" value="3&nbsp;&nbsp;<?php echo htmlentities($teams[24+3]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team10" type="button" onclick="advanceTeam('rd2winner7', this.id)" value="6&nbsp;&nbsp;<?php echo htmlentities($teams[8+6]);?>"></td>
					  	<td><input id="team26" type="button" onclick="advanceTeam('rd2winner15', this.id)" value="6&nbsp;&nbsp;<?php echo htmlentities($teams[24+6]);?>"></td>
					 </tr>
					 <tr>
					  	<td>&nbsp;<input id="team2" type="button" onclick="advanceTeam('rd2winner8', this.id)" value="2&nbsp;&nbsp;<?php echo htmlentities($teams[8+2]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner8" type="button" name="winner8" onclick="advanceTeam('rd3winner4', this.id)" value="<?php echo htmlentities($winner[8]);?>"></td>
					  	<td rowspan="2">&nbsp;<input id="rd2winner16" type="button" name="winner16" onclick="advanceTeam('rd3winner8', this.id)" value="<?php echo htmlentities($winner[16]);?>"></td>
					  	<td>&nbsp;<input id="team18" type="button" onclick="advanceTeam('rd2winner16', this.id)" value="2&nbsp;&nbsp;<?php echo htmlentities($teams[24+2]);?>"></td>
					 </tr>
					 <tr>
					  	<td><input id="team15" type="button" onclick="advanceTeam('rd2winner8', this.id)" value="7&nbsp;&nbsp;<?php echo htmlentities($teams[8+7]);?>"></td>
					  	<td><input id="team31" type="button" onclick="advanceTeam('rd2winner16', this.id)" value="7&nbsp;&nbsp;<?php echo htmlentities($teams[24+7]);?>"></td>
					 </tr>
				</table>
				<input class="submit" type="submit" value="Submit" name="submit">
		    </form> 
		</div>

		<?php
		include 'php_update_bracket.php';
		?>

	</div>

	<script> function label_winners_and_losers() {

		var k = 0;
		var user_picks = JSON.parse('<?php echo json_encode($winners_numeric) ?>');
		var master_picks = JSON.parse('<?php echo json_encode($master_bracket_numeric) ?>');

		while (k < 28) {
			compare_teams(user_picks[k], master_picks[k], k);
			k++;
		}
	}
	</script>

	<script> function compare_teams(team1, team2, team_num) {
		team_num += 1;
		if(team2 != '' && team2 != null) {
			if(team1 == team2) {
				document.getElementsByName("winner"+team_num).item(1).className += " right_pick";
			} else {
				document.getElementsByName("winner"+team_num).item(1).className += " wrong_pick";
			}
		}	
	}
	</script>
	
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
			
			var res = str.substring(3,20);

			document.getElementById("champ1").src = "helmets/" + res + ".png";
			document.getElementById("champ1").style.display = "block";
		} else {
			document.getElementById("champ1").style.display = "none";
		}

		if(parseInt(document.getElementById("rd5winner2").value) > 0) {
			var m = parseInt(document.getElementById("rd5winner2").value);
			var str2 = document.getElementById("rd5winner2").value;

			var res2 = str2.substring(3,20);

			document.getElementById("champ2").src = "helmets/" + res2 + ".png";
			document.getElementById("champ2").style.display = "block";
		} else {
			document.getElementById("champ2").style.display = "none";
		}

		if(parseInt(document.getElementById("champion").value) > 0) {
			var p = parseInt(document.getElementById("champion").value);
			var str3 = document.getElementById("champion").value;

			var res3 = str3.substring(3,20);

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

		if(val == document.getElementById("champion").value) {
			document.getElementById("champion").value = "\u00a0";
		}

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

	<script> function do_this() {
		helmetToggle();
		label_regions();
		label_winners_and_losers();
	}
	</script>

	<script> function label_regions() {
		var div = <?php echo htmlentities($bracket_div[0]);?>;
		switch(div) {
			case 2:
				document.getElementById("reg3").innerHTML = "Region 5";
				document.getElementById("reg4").innerHTML = "Region 6";
				document.getElementById("reg5").innerHTML = "Region 7";
				document.getElementById("reg6").innerHTML = "Region 8";
				break;
			case 3:
				document.getElementById("reg3").innerHTML = "Region 9";
				document.getElementById("reg4").innerHTML = "Region 10";
				document.getElementById("reg5").innerHTML = "Region 11";
				document.getElementById("reg6").innerHTML = "Region 12";
				break;
			case 4:
				document.getElementById("reg3").innerHTML = "Region 13";
				document.getElementById("reg4").innerHTML = "Region 14";
				document.getElementById("reg5").innerHTML = "Region 15";
				document.getElementById("reg6").innerHTML = "Region 16";
				break;
			case 5:
				document.getElementById("reg3").innerHTML = "Region 17";
				document.getElementById("reg4").innerHTML = "Region 18";
				document.getElementById("reg5").innerHTML = "Region 19";
				document.getElementById("reg6").innerHTML = "Region 20";
				break;
			case 6:
				document.getElementById("reg3").innerHTML = "Region 21";
				document.getElementById("reg4").innerHTML = "Region 22";
				document.getElementById("reg5").innerHTML = "Region 23";
				document.getElementById("reg6").innerHTML = "Region 24";
				break;
			case 7:
				document.getElementById("reg3").innerHTML = "Region 25";
				document.getElementById("reg4").innerHTML = "Region 26";
				document.getElementById("reg5").innerHTML = "Region 27";
				document.getElementById("reg6").innerHTML = "Region 28";
				break;
		}
	}
	</script>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>