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
    $getName = "SELECT username,email FROM users WHERE email = '".$_SESSION["sess_user"]."'";
    $res = mysqli_query($con, $getName);
    $name_email = mysqli_fetch_array($res);

    $getID = "SELECT user_id FROM users WHERE email = '".$_SESSION["sess_user"]."'";
    $res2 = mysqli_query($con, $getID);
    $id = mysqli_fetch_array($res2);

    $findBrackets = "SELECT bracket_id FROM user_brackets WHERE user_id = $id[0]";
    $res3 = mysqli_query($con, $findBrackets);
    $brack_count = mysqli_num_rows($res3);

    $brackets = array();
    $bracket_ids = array();
    if ($brack_count > 0) {
        $getBrackets = "SELECT * FROM user_brackets WHERE user_id = $id[0]";
        $res4 = mysqli_query($con, $getBrackets);
        while($row = mysqli_fetch_array($res4)) {
            $brackets[] = $row["bracket_name"];
            $bracket_ids[] = $row["bracket_id"];
        }
    }
}


$d1_leaders_bracket_name = array();
$d1_leaders_bracket_id = array();
$d1_leaders_bracket_user = array();
$d1_leaders_bracket_pts = array();
$get_d1_leaders = "SELECT * FROM user_brackets WHERE bracket_id != 24 AND bracket_type = 1 ORDER BY points DESC LIMIT 15";
$res5 = mysqli_query($con, $get_d1_leaders);
$d1_leaders_brack_count = mysqli_num_rows($res5);
while($row2 = mysqli_fetch_array($res5)) {
    $d1_leaders_bracket_name[] = $row2["bracket_name"];
    $d1_leaders_bracket_id[] = $row2["bracket_id"];
    $d1_leaders_bracket_user[] = $row2["username"];
    $d1_leaders_bracket_pts[] = $row2["points"];
}

$d2_leaders_bracket_name = array();
$d2_leaders_bracket_id = array();
$d2_leaders_bracket_user = array();
$d2_leaders_bracket_pts = array();
$get_d2_leaders = "SELECT * FROM user_brackets WHERE bracket_id != 24 AND bracket_type = 2 ORDER BY points DESC LIMIT 15";
$res6 = mysqli_query($con, $get_d2_leaders);
$d2_leaders_brack_count = mysqli_num_rows($res6);
while($row3 = mysqli_fetch_array($res6)) {
    $d2_leaders_bracket_name[] = $row3["bracket_name"];
    $d2_leaders_bracket_id[] = $row3["bracket_id"];
    $d2_leaders_bracket_user[] = $row3["username"];
    $d2_leaders_bracket_pts[] = $row3["points"];
}

$d3_leaders_bracket_name = array();
$d3_leaders_bracket_id = array();
$d3_leaders_bracket_user = array();
$d3_leaders_bracket_pts = array();
$get_d3_leaders = "SELECT * FROM user_brackets WHERE bracket_id != 24 AND bracket_type = 3 ORDER BY points DESC LIMIT 15";
$res7 = mysqli_query($con, $get_d3_leaders);
$d3_leaders_brack_count = mysqli_num_rows($res7);
while($row4 = mysqli_fetch_array($res7)) {
    $d3_leaders_bracket_name[] = $row4["bracket_name"];
    $d3_leaders_bracket_id[] = $row4["bracket_id"];
    $d3_leaders_bracket_user[] = $row4["username"];
    $d3_leaders_bracket_pts[] = $row4["points"];
}

$d4_leaders_bracket_name = array();
$d4_leaders_bracket_id = array();
$d4_leaders_bracket_user = array();
$d4_leaders_bracket_pts = array();
$get_d4_leaders = "SELECT * FROM user_brackets WHERE bracket_id != 24 AND bracket_type = 4 ORDER BY points DESC LIMIT 15";
$res8 = mysqli_query($con, $get_d4_leaders);
$d4_leaders_brack_count = mysqli_num_rows($res8);
while($row5 = mysqli_fetch_array($res8)) {
    $d4_leaders_bracket_name[] = $row5["bracket_name"];
    $d4_leaders_bracket_id[] = $row5["bracket_id"];
    $d4_leaders_bracket_user[] = $row5["username"];
    $d4_leaders_bracket_pts[] = $row5["points"];
}

$d5_leaders_bracket_name = array();
$d5_leaders_bracket_id = array();
$d5_leaders_bracket_user = array();
$d5_leaders_bracket_pts = array();
$get_d5_leaders = "SELECT * FROM user_brackets WHERE bracket_id != 24 AND bracket_type = 5 ORDER BY points DESC LIMIT 15";
$res9 = mysqli_query($con, $get_d5_leaders);
$d5_leaders_brack_count = mysqli_num_rows($res9);
while($row6 = mysqli_fetch_array($res9)) {
    $d5_leaders_bracket_name[] = $row6["bracket_name"];
    $d5_leaders_bracket_id[] = $row6["bracket_id"];
    $d5_leaders_bracket_user[] = $row6["username"];
    $d5_leaders_bracket_pts[] = $row6["points"];
}

$d6_leaders_bracket_name = array();
$d6_leaders_bracket_id = array();
$d6_leaders_bracket_user = array();
$d6_leaders_bracket_pts = array();
$get_d6_leaders = "SELECT * FROM user_brackets WHERE bracket_id != 24 AND bracket_type = 6 ORDER BY points DESC LIMIT 15";
$res10 = mysqli_query($con, $get_d6_leaders);
$d6_leaders_brack_count = mysqli_num_rows($res10);
while($row7 = mysqli_fetch_array($res10)) {
    $d6_leaders_bracket_name[] = $row7["bracket_name"];
    $d6_leaders_bracket_id[] = $row7["bracket_id"];
    $d6_leaders_bracket_user[] = $row7["username"];
    $d6_leaders_bracket_pts[] = $row7["points"];
}

$d7_leaders_bracket_name = array();
$d7_leaders_bracket_id = array();
$d7_leaders_bracket_user = array();
$d7_leaders_bracket_pts = array();
$get_d7_leaders = "SELECT * FROM user_brackets WHERE bracket_id != 24 AND bracket_type = 7 ORDER BY points DESC LIMIT 15";
$res11 = mysqli_query($con, $get_d7_leaders);
$d7_leaders_brack_count = mysqli_num_rows($res11);
while($row8 = mysqli_fetch_array($res11)) {
    $d7_leaders_bracket_name[] = $row8["bracket_name"];
    $d7_leaders_bracket_id[] = $row8["bracket_id"];
    $d7_leaders_bracket_user[] = $row8["username"];
    $d7_leaders_bracket_pts[] = $row8["points"];
}
?>