<?php
if(isset($_POST["create"])) {
    if(!empty($_POST['brackName'])) {

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