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
		printf("<script>location.href='bracket2.php?bracket_id=$id_bracket'</script>");

	} else {
		echo "Error1";
	}
  } else {
  	 echo "Error2";
  }
}
?>