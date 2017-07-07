<?php
if(isset($_POST["login"])){
    if(!empty($_POST['email']) && !empty($_POST['pass'])) {
        $email=strtolower($_POST['email']);
        $pass=$_POST['pass'];

        $checkUser="SELECT * FROM users WHERE email='".$email."'";
        $query=mysqli_query($con, $checkUser);
        $numrows=mysqli_num_rows($query);
                
        if($numrows!=0) {
            while($row=mysqli_fetch_assoc($query)) {
                $dbusername=$row['email'];
                $dbpassword=$row['password'];
            }

            if($email == $dbusername && password_verify($pass, $dbpassword)) {
                //session_start();
                $_SESSION['sess_user'] = $email;

                /* Redirect browser */
                header("Refresh:0");
            } else {
            	echo "Incorrect Password. Please try again.";
            }
        } else {
            echo "No account exists that matches given email address";
        }
    } else {
        echo "All fields are required!";
    }
}

if(isset($_POST["register"])){                    
    if(!empty($_POST['user_name']) && !empty($_POST['pass']) && !empty($_POST['confirm_pass']) && !empty($_POST['email']) && !empty($_POST['confirm_email'])) {                                  
        if ($_POST["pass"] == $_POST["confirm_pass"]) {
        	if (strtolower($_POST['email']) == strtolower($_POST["confirm_email"])) {

        		$user_name=$_POST['user_name'];
				$pass=$_POST['pass'];
                $email=strtolower($_POST['email']);								

                $checkUser="SELECT * FROM users WHERE email='".$email."'";
                $query=mysqli_query($con, $checkUser);
                $email_numrows=mysqli_num_rows($query);

                $checkUsername="SELECT * FROM users WHERE username='".$user_name."'";
                $result=mysqli_query($con, $checkUsername);
                $user_numrows=mysqli_num_rows($result);
                
	            if($email_numrows==0) {
	            	if ($user_numrows==0) {

	            		$pass = password_hash($pass, PASSWORD_DEFAULT);
	            		
	            		$sql="INSERT INTO users (username, email, password) VALUES(?, ?, ?)";

	            		if ($stmt = $con->prepare($sql)) {
	            			$stmt->bind_param("sss", $user_name, $email, $pass);
	            			if ($stmt->execute()) {
								$_SESSION['sess_user'] = $email;
								$stmt->close();
		                    	header("Refresh:0");
	            			} else {
	            				echo "Error: Insert into DB failed.";
	            			}
	            		} else {
		                    echo "Error: Could not connect to DB.";
		                }
	            	} else {
	            		echo "Username already exists. Please enter a different Username.";
	            	}	                
	            } else {
	                echo "A user already exists for this email.";
	            }
        	} else {
        		echo "Emails do not match.";
        	}
        } else {
            echo "Passwords do not match";
        }
    } else {
        echo "All fields are required";
    }
}
?>