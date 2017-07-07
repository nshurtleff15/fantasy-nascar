<?php 
session_start();
ob_start();
include 'php_user_home.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HSFC</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_user_home.css">
</head>
<body>

    <!-- Site-wide Nav Bar -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border-color: #194775;">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand logo" href="#">HSF<span style="color: #d6d6d6;">CHALLENGE</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">

            <?php
                if ($session_set) {
                    echo '<li><a class="no_highlight" href="#" data-toggle="modal" data-target="#accountModal"><span class="glyphicon glyphicon-user" style="margin-right: 7px;"></span>'.$name_email[0].' | My Account</a></li>';
                    echo '<li><a class="no_highlight" href="sign_out.php" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                } else {
                    echo '<li><a class="no_highlight" href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login / Register</a></li>';
                }
            ?>
                       
          </ul>
        </div>
      </div>
    </nav>
    <!-- END Nav Bar -->

    <div class="container-fluid">

        <!-- Login / Register Modal -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 25px;">
                    <div class="modal-header" style="padding:35px 50px; border-radius: 15px 15px 0 0;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Sign In</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
                                <input type="text" class="form-control" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="psw"></span> Password</label>
                                <input type="password" class="form-control" placeholder="Enter password" name="pass">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="" checked>Remember me</label>
                            </div>
                            <input class="btn btn-block" type="submit" value="Sign In" name="login" style="background-color: #194775; color: white;" />
                        </form>

                        <?php
                        include 'php_login_register.php';
                        ?>

                    </div>
                    <div class="modal-footer" style="border-radius: 0 0 15px 15px;">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <p class="account-create">Not a member? <a href="#">Sign Up</a></p>
                        <p class="modal-sign-in" style="display:none">Already a member? <a href="#">Sign In</a></p>
                        <p class="forgot-password">Forgot <a href="#">Password?</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Login / Register Modal -->

        <!-- Account Modal -->
        <div class="modal fade" id="accountModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 25px;">
                    <div class="modal-header" style="padding:35px 50px; border-radius: 15px 15px 0 0;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span> Account Settings</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label><span class="glyphicon glyphicon-user"></span> Username:</label>
                                <p><?php echo $name_email[0]; ?><a href="" style="margin-left: 10px;">Edit</a></p>
                            </div>
                            <div class="form-group">
                                <label><span class="glyphicon glyphicon-envelope"></span> Email:</label>
                                <p><?php echo $name_email[1]; ?><a href="" style="margin-left: 10px;">Edit</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <label><span class="glyphicon glyphicon-pencil"></span> Change Password:</label>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Enter Old Password" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Enter New Password" name="pass">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm New Password" name="pass">
                            </div>
                            <button class="btn btn-block" type="button" name="update" style="background-color: #194775; color: white;">Update Account</button>
                        </form>
                    </div>
                    <div class="modal-footer" style="border-radius: 0 0 15px 15px;"></div>
                </div>
            </div>
        </div>
        <!-- END Account Modal -->

        <!-- Create Bracket Modal -->
        <div class="modal fade" id="bracketModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 25px;">
                    <div class="modal-header" style="padding:35px 50px; border-radius: 15px 15px 0 0;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create A Bracket</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Name your bracket</label>
                                <input type="text" class="form-control" placeholder="Bracket name" name="brackName" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label>Bracket Type</label>
                                <select class="form-control" name="div">
                                    <option value="1">Div. 1</option>
                                    <option value="2">Div. 2</option>
                                    <option value="3">Div. 3</option>
                                    <option value="4">Div. 4</option>
                                    <option value="5">Div. 5</option>
                                    <option value="6">Div. 6</option>
                                    <option value="7">Div. 7</option>
                                </select>
                            </div>

                            <input class="btn btn-block" type="submit" value="Create Bracket" name="create" style="background-color: #194775; color: white;" />
                        </form>

                        <?php
                        include 'php_create_bracket.php';
                        ?>

                    </div>
                    <div class="modal-footer" style="border-radius: 0 0 15px 15px;"></div>
                </div>
            </div>
        </div>
        <!-- END Create Bracket Modal -->


        <div class="row">
            <!-- Game Home Main Content -->
            <div class="col-lg-5 col-lg-offset-1 div_size">
                <div class="row content">
                    <div class="col-sm-12 text-left">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="" style="color: #194775">Game Home</a></li>
                            
                            <?php

                            if ($session_set) {
                                echo '<li class="dropdown"><a class="my_dropdowns"href="#">Brackets <span class="caret"></span></a><ul class="dropdown-menu" role="menu" style="border: 1px solid black">';

                                $k = 0;
                                while ($k < $brack_count) {
                                    echo "<li>";
                                    echo "<a href='bracket2.php?bracket_id=";
                                    echo $bracket_ids[$k];
                                    echo "' id='b1'>";
                                    echo $brackets[$k];
                                    echo "</a></li>";

                                    $k++;
                                }

                                if ($brack_count < 1) {
                                    echo '<li><a href="#" data-toggle="modal" data-target="#bracketModal" id="create_brack" style="display: block;">Create A Bracket</a></li>';
                                } else if ($brack_count < 14) {
                                    echo '<li><a href="#" data-toggle="modal" data-target="#bracketModal" id="create_brack" style="display: block; border-top: 1px solid black; padding-top: 6px; margin-top: 3px">Create A Bracket</a></li>';
                                }
                                echo '</ul></li>';                            
                                echo '<li class="dropdown"><a class="my_dropdowns" href="#">Groups <span class="caret"></span></a><ul class="dropdown-menu" role="menu" style="border: 1px solid black">';
                                //if ($brack_count < 1) {
                                    echo '<li><a href="#">Create or Join Group</a></li></ul></li>';
                                //} else {
                                    //echo '<li><a href="group_search.php" style="border-top: 1px solid black; padding-top: 6px;margin-top: 3px">Create or Join Group</a></li></ul></li>';
                                //}                               
                            }?>
                                    
                        </ul>
                        <div class="game_home">
                            <h2>Welcome to the 2017 High School Football Challenge!</h2>
                            <p>No Content Currently.</p>
                        </div>
                    </div>
                 </div>
            </div>
            <!-- END Game Home Main Content -->

            <!-- Game Home Leaderboard -->
            <div class="col-lg-4 col-lg-offset-1 div_size">
                <div class="row content">
                    <div class="col-sm-12 text-left leaderboard">
                        <h3 style="margin: 0;background-color: #1a1a1a; padding: 10px; margin-bottom: 10px; text-align: center; border-radius: 4px; border: 1px solid #b3b3b3">Leaderboard</h1>
                        <ul class="nav nav-tabs" style="margin: 0;background-color: #1a1a1a; border-radius: 4px 4px 0 0; border: 1px solid #b3b3b3">
                          <li class="active"><a data-toggle="tab" href="#div1" class="my_pills">Div 1</a></li>
                          <li><a data-toggle="tab" href="#div2" class="my_pills">Div 2</a></li>
                          <li><a data-toggle="tab" href="#div3" class="my_pills">Div 3</a></li>
                          <li><a data-toggle="tab" href="#div4" class="my_pills">Div 4</a></li>
                          <li><a data-toggle="tab" href="#div5" class="my_pills">Div 5</a></li>
                          <li><a data-toggle="tab" href="#div6" class="my_pills">Div 6</a></li>
                          <li><a data-toggle="tab" href="#div7" class="my_pills">Div 7</a></li>
                        </ul>

                        <div class="tab-content">
                          <div id="div1" class="tab-pane fade in active">
                            <div class="table-responsive">          
                              <table class="table"style="margin: 0;background-color: #1a1a1a; border-radius: 0 0 4px 4px; border: 1px solid #b3b3b3;">
                                <thead>
                                  <tr style="background-color: #194775; color: #fff;">
                                    <th>Rank</th>
                                    <th>Bracket</th>
                                    <th>Username</th>
                                    <th>Points</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;

                                    while ($i < 15) {

                                        echo "<tr>";
                                        echo "<td>".($i + 1)."</td>";

                                        if ($i < $d1_leaders_brack_count) {                                           
                                            echo "<td><a class='leader_bracket' href='bracket2.php?bracket_id=".$d1_leaders_bracket_id[$i]."''>".$d1_leaders_bracket_name[$i]."</a></td>";
                                            echo "<td>".$d1_leaders_bracket_user[$i]."</td>";
                                            echo "<td>".$d1_leaders_bracket_pts[$i]."</td>";
                                        } else {
                                            echo "<td>-- Empty --</td><td></td><td></td>";
                                        }
                                        echo "</tr>";

                                        $i++;
                                    }?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="div2" class="tab-pane fade">
                            <div class="table-responsive">          
                              <table class="table"style="margin: 0;background-color: #1a1a1a; border-radius: 0 0 4px 4px; border: 1px solid #b3b3b3;">
                                <thead>
                                  <tr style="background-color: #194775; color: #fff;">
                                    <th>Rank</th>
                                    <th>Bracket</th>
                                    <th>Username</th>
                                    <th>Points</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ii = 0;

                                    while ($ii < 15) {

                                        echo "<tr>";
                                        echo "<td>".($ii + 1)."</td>";

                                        if ($ii < $d2_leaders_brack_count) {                                           
                                            echo "<td><a class='leader_bracket' href='bracket2.php?bracket_id=".$d2_leaders_bracket_id[$ii]."''>".$d2_leaders_bracket_name[$ii]."</td>";
                                            echo "<td>".$d2_leaders_bracket_user[$ii]."</td>";
                                            echo "<td>".$d2_leaders_bracket_pts[$ii]."</td>";
                                        } else {
                                            echo "<td>-- Empty --</td><td></td><td></td>";
                                        }
                                        echo "</tr>";

                                        $ii++;
                                    }?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="div3" class="tab-pane fade">
                            <div class="table-responsive">          
                              <table class="table"style="margin: 0;background-color: #1a1a1a; border-radius: 0 0 4px 4px; border: 1px solid #b3b3b3;">
                                <thead>
                                  <tr style="background-color: #194775; color: #fff;">
                                    <th>Rank</th>
                                    <th>Bracket</th>
                                    <th>Username</th>
                                    <th>Points</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $iii = 0;

                                    while ($iii < 15) {

                                        echo "<tr>";
                                        echo "<td>".($iii + 1)."</td>";

                                        if ($iii < $d3_leaders_brack_count) {                                           
                                            echo "<td><a class='leader_bracket' href='bracket2.php?bracket_id=".$d3_leaders_bracket_id[$iii]."''>".$d3_leaders_bracket_name[$iii]."</td>";
                                            echo "<td>".$d3_leaders_bracket_user[$iii]."</td>";
                                            echo "<td>".$d3_leaders_bracket_pts[$iii]."</td>";
                                        } else {
                                            echo "<td>-- Empty --</td><td></td><td></td>";
                                        }
                                        echo "</tr>";

                                        $iii++;
                                    }?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="div4" class="tab-pane fade in">
                            <div class="table-responsive">          
                              <table class="table"style="margin: 0;background-color: #1a1a1a; border-radius: 0 0 4px 4px; border: 1px solid #b3b3b3;">
                                <thead>
                                  <tr style="background-color: #194775; color: #fff;">
                                    <th>Rank</th>
                                    <th>Bracket</th>
                                    <th>Username</th>
                                    <th>Points</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $iv = 0;

                                    while ($iv < 15) {

                                        echo "<tr>";
                                        echo "<td>".($iv + 1)."</td>";

                                        if ($iv < $d4_leaders_brack_count) {                                           
                                            echo "<td><a class='leader_bracket' href='bracket2.php?bracket_id=".$d4_leaders_bracket_id[$iv]."''>".$d4_leaders_bracket_name[$iv]."</td>";
                                            echo "<td>".$d4_leaders_bracket_user[$iv]."</td>";
                                            echo "<td>".$d4_leaders_bracket_pts[$iv]."</td>";
                                        } else {
                                            echo "<td>-- Empty --</td><td></td><td></td>";
                                        }
                                        echo "</tr>";

                                        $iv++;
                                    }?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="div5" class="tab-pane fade">
                            <div class="table-responsive">          
                              <table class="table"style="margin: 0;background-color: #1a1a1a; border-radius: 0 0 4px 4px; border: 1px solid #b3b3b3;">
                                <thead>
                                  <tr style="background-color: #194775; color: #fff;">
                                    <th>Rank</th>
                                    <th>Bracket</th>
                                    <th>Username</th>
                                    <th>Points</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $v = 0;

                                    while ($v < 15) {

                                        echo "<tr>";
                                        echo "<td>".($v + 1)."</td>";

                                        if ($v < $d5_leaders_brack_count) {                                           
                                            echo "<td><a class='leader_bracket' href='bracket2.php?bracket_id=".$d5_leaders_bracket_id[$v]."''>".$d5_leaders_bracket_name[$v]."</td>";
                                            echo "<td>".$d5_leaders_bracket_user[$v]."</td>";
                                            echo "<td>".$d5_leaders_bracket_pts[$v]."</td>";
                                        } else {
                                            echo "<td>-- Empty --</td><td></td><td></td>";
                                        }
                                        echo "</tr>";

                                        $v++;
                                    }?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="div6" class="tab-pane fade">
                            <div class="table-responsive">          
                              <table class="table"style="margin: 0;background-color: #1a1a1a; border-radius: 0 0 4px 4px; border: 1px solid #b3b3b3;">
                                <thead>
                                  <tr style="background-color: #194775; color: #fff;">
                                    <th>Rank</th>
                                    <th>Bracket</th>
                                    <th>Username</th>
                                    <th>Points</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $vi = 0;

                                    while ($vi < 15) {

                                        echo "<tr>";
                                        echo "<td>".($vi + 1)."</td>";

                                        if ($vi < $d6_leaders_brack_count) {                                           
                                            echo "<td><a class='leader_bracket' href='bracket2.php?bracket_id=".$d6_leaders_bracket_id[$vi]."''>".$d6_leaders_bracket_name[$vi]."</td>";
                                            echo "<td>".$d6_leaders_bracket_user[$vi]."</td>";
                                            echo "<td>".$d6_leaders_bracket_pts[$vi]."</td>";
                                        } else {
                                            echo "<td>-- Empty --</td><td></td><td></td>";
                                        }
                                        echo "</tr>";

                                        $vi++;
                                    }?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="div7" class="tab-pane fade">
                            <div class="table-responsive">          
                              <table class="table"style="margin: 0;background-color: #1a1a1a; border-radius: 0 0 4px 4px; border: 1px solid #b3b3b3;">
                                <thead>
                                  <tr style="background-color: #194775; color: #fff;">
                                    <th>Rank</th>
                                    <th>Bracket</th>
                                    <th>Username</th>
                                    <th>Points</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $vii = 0;

                                    while ($vii < 15) {

                                        echo "<tr>";
                                        echo "<td>".($vii + 1)."</td>";

                                        if ($vii < $d7_leaders_brack_count) {                                           
                                            echo "<td><a class='leader_bracket' href='bracket2.php?bracket_id=".$d7_leaders_bracket_id[$vii]."''>".$d7_leaders_bracket_name[$vii]."</td>";
                                            echo "<td>".$d7_leaders_bracket_user[$vii]."</td>";
                                            echo "<td>".$d7_leaders_bracket_pts[$vii]."</td>";
                                        } else {
                                            echo "<td>-- Empty --</td><td></td><td></td>";
                                        }
                                        echo "</tr>";

                                        $vii++;
                                    }?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
                 </div>
            </div>
            <!-- END Game Home Leaderboard -->  
        </div>
    </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/toggle_login_register6.js"></script>

</body>
</html>