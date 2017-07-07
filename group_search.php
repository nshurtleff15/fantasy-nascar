<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSFC</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link href="css/HSFM.css" rel="stylesheet">

    <style type="text/css">
        body {
            margin: 0px;
            min-height: 100%;
            background: linear-gradient(#194775, #848484);  /*Standard syntax */
            background-repeat: no-repeat;
            background-color: #848484;
        }

        html {
            margin: 0px;
            height: 100%;
        }

        .hide {
            display: none;
        }

        .standings {
            margin-left: 215px;
        }

        .top_margin {
            margin-top: 50px;
        }

        .fantasy_pts_leaderboard {
            margin-top: 0px;
        }

        .scoreboard_space {
            margin-top: 10px;
        }

        .scoreboard_space_first {
            margin-top: 10px;
        }

        @media screen and (max-width: 767px) {
            .standings {
                margin-left: 0px;
            }

            .top_margin {
                margin-top: 10px;
            }

            .fantasy_pts_leaderboard {
                margin-top: 40px;
            }

            .scoreboard_space {
                margin-top: 50px;
            }

            .scoreboard_space_first {
                margin-top: 0px;
            }
        }

    </style>
</head>

<body>

<nav class="navbar navbar-inverse" style="margin-bottom: 0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" style="font-style: italic; color: #4286f4;"><span style="color: yellow;">Fantasy</span><span style="color: red;">Nascar</span>League</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a data-toggle="tab" href="#tab1">Home</a></li>
        <li><a data-toggle="tab" href="#tab2">Schedule/Results</a></li>
        <li><a data-toggle="tab" href="#tab3">Standings</a></li>
        <li><a data-toggle="tab" href="#tab4">Teams</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
    <div class="tab-content">
        <div id="tab1" class="tab-pane fade in active">
            <div class="row top_margin">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3 style="color: #fff;text-align: center;"><?php

                        $tracksplit = 'track-split';

                        $xml = simplexml_load_file("sprint_cup_drivers.xml");

                        echo "Martinsville Speedway Driver Splits";

                    ?></h3>
                    <div class="table-responsive" style="border-right: 3px solid #fff; margin-top: 20px;">       
                    <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                        <thead>
                            <tr>                    
                                <th style='width: 162px';>Driver</th>
                                <th>Starts</th>
                                <th>Wins</th>
                                <th>Top 5</th>
                                <th>Top 10</th>
                                <th>Poles</th>
                                <th>DNF</th>
                                <th>Laps Led</th>
                                <th>Avg Start Pos</th>
                                <th>Avg Finish Pos</th>
                                <!-- <th>Track Name</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $nascar_drivers = array();
                            foreach ($xml->season[0]->driver as $driver) {
                                array_push($nascar_drivers, $driver);
                            }

                            /*function sort_cup_drivers($a,$b) {
                                if ($a->$tracksplit->record[$j]['avg_finish_position'] == $b->$tracksplit->record[$j]['avg_finish_position']) {
                                    return 0;
                                } else {
                                    return ($a->$tracksplit->record[$j]['avg_finish_position'] > $b->$tracksplit->record[$j]['avg_finish_position']) ? -1 : 1;
                                }                           
                            }

                            usort($nascar_drivers, "sort_cup_drivers");*/

                            $i = 0;

                            while ($i < 46) {

                                $k = 0;
                                $j = 0;
                                foreach ($xml->season[0]->driver[$i]->$tracksplit->record as $record) {
                                    if ((string) $record['name'] == 'Martinsville Speedway') {
                                        $j = $k;
                                    }
                                    $k++;
                                }

                                echo "<tr>";

                                // PUT $xml->season[0]->driver[$i]->$tracksplit->record[$j]['DATA'] INTO AN OBJECT
                                // USE [OBJECT]->get_avg_finish TO SORT THE OBJECT RECORDS
                                // ECHO SORTED LIST
                                // TL;DR -> INSTEAD OF ECHOING EACH RECORD OUT OF ORDER, STORE IN AN OBJECT, SORT IT, THEN ECHO SORTED RECORDS

                                echo "<td style='width: 175px;'>".$xml->season[0]->driver[$i]['full_name']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['starts']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['wins']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['top_5']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['top_10']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['poles']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['dnf']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['laps_led']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['avg_start_position']."</td>";
                                echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['avg_finish_position']."</td>";
                                //echo "<td>".$xml->season[0]->driver[$i]->$tracksplit->record[$j]['name']."</td>";

                                echo "</tr>";

                                $i++;
                            }?>
                        </tbody>
                    </table>
                    </div>
                </div>  
            </div>  
        </div>
        
        <div id="tab2" class="tab-pane fade">
           <?php

            include 'nascar_teams.php';

            function getPoints($data) {
                $pts = 0;
                if ($data["position"] == 1) {
                    $pts = 52;
                } else {
                    $pts = 41 - $data["position"];
                }

                if ($data["start_position"] == 1) {
                    $pts += 2;
                }

                if ($data["stage_1_win"] == true) {
                    $pts += 2;
                }

                if ($data["stage_2_win"] == true) {
                    $pts += 2;
                }

                return $pts;
            }

            function check_for_bonus($name, $file) {
                // Bonus logic for when Kyle Busch punched Joey Logano's stupid face at Las Vegas //
                if ($name->get_driver() == "Kyle Busch" && $file == "las_vegas_results.xml") {
                    return 1;
                } else {
                    return 0;
                }
            }

            function season_check_for_bonus($name, $file) {
                // SEASON LONG Bonus logic for when Kyle Busch punched Joey Logano's stupid face at Las Vegas //
                if ($name->get_name() == "Kyle Busch" && $file == "las_vegas_results.xml") {
                    return 1;
                } else {
                    return 0;
                }
            }

            function get_results($team, $file) {
                $xml2 = simplexml_load_file($file);
                $points = 0;
                $driver_pts = 0;
                foreach ($team->get_drivers() as $driver) {
                    foreach ($xml2->results->result as $result) {
                        if ($driver->get_driver() == $result->driver["full_name"]) {
                            $driver_pts = getPoints($result);                    
                        }               
                    }
                    $driver_pts += check_for_bonus($driver, $file);
                    $driver->set_driver_points($driver_pts);
                    $points += $driver_pts;
                }
                $team->set_points($points);
            }

            function get_season_points($drivers, $file) {
                $xml2 = simplexml_load_file($file);
                $points = 0;
                foreach ($drivers as $driver) {
                    foreach ($xml2->results->result as $result) {
                        if ($driver->get_name() == $result->driver["full_name"]) {
                            $points = getPoints($result);
                            $points += season_check_for_bonus($driver, $file);
                            $driver->add_season_pts($points);
                            $driver->add_start();
                        }
                    }
                }
            }
            
            $k = 0;
            while ($k < 10) {
                
                get_results($week_1_teams[$k], "daytona500_results.xml");
                get_results($week_2_teams[$k], "atlanta_results.xml");
                get_results($week_3_teams[$k], "las_vegas_results.xml");
                get_results($week_4_teams[$k], "phoenix_results.xml");
                get_results($week_5_teams[$k], "fontana_results.xml");
                get_results($week_6_teams[$k], "martinsville_results.xml", $k);
                //get_results($week_7_teams[$k], "texas_results.xml", $k);
                
                $k++;
            }

            get_season_points($season_drivers, "daytona500_results.xml");
            get_season_points($season_drivers, "atlanta_results.xml");
            get_season_points($season_drivers, "las_vegas_results.xml");
            get_season_points($season_drivers, "phoenix_results.xml");
            get_season_points($season_drivers, "fontana_results.xml");
            get_season_points($season_drivers, "martinsville_results.xml");

            ?>

            <div class="row top_margin">
                <div class="col-lg-2 col-lg-offset-5">
                    <select class="div-toggle form-control" data-target=".my-scoreboard">
                        <option value="one" data-show=".week1">Week 1 (Daytona)</option>
                        <option value="two" data-show=".week2" selected="selected">Week 2 (Atlanta)</option>
                        <option value="three" data-show=".week3">Week 3 (Las Vegas)</option>
                        <option value="four" data-show=".week4">Week 4 (Phoenix)</option>
                        <option value="five" data-show=".week5">Week 5 (Fontana)</option>
                        <option value="six" data-show=".week6">Week 6 (Martinsville)</option>
                        <option value="seven" data-show=".week7">Week 7 (Texas)</option>
                        <option value="eight" data-show=".week8">Week 8 (Bristol)</option>
                        <option value="nine" data-show=".week9">Week 9 (Richmond)</option>
                        <option value="ten" data-show=".week10">Week 10 (Talladega)</option>
                        <option value="eleven" data-show=".week11">Week 11 (Kansas)</option>
                        <option value="twelve" data-show=".week12">Week 12 (Charlotte)</option>
                        <option value="thirteen" data-show=".week13">Week 13 (Dover)</option>
                        <option value="fourteen" data-show=".week14">Week 14 (Pocono)</option>
                        <option value="fifteen" data-show=".week15">Week 15 (Michigan)</option>
                        <option value="sixteen" data-show=".week16">Week 16 (Sonoma)</option>
                        <option value="seventeen" data-show=".week17">Week 17 (Daytona)</option>
                        <option value="eighteen" data-show=".week18">Week 18 (Kentucky)</option>
                        <option value="nineteen" data-show=".week19">Week 19 (New Hampshire)</option>
                        <option value="twenty" data-show=".week20">Week 20 (Indianapolis)</option>
                        <option value="twenty-one" data-show=".week21">Week 21 (Pocono)</option>
                        <option value="twenty-two" data-show=".week22">Week 22 (Watkins Glen)</option>
                        <option value="twenty-three" data-show=".week23">Week 23 (Michigan)</option>
                        <option value="twenty-four" data-show=".week24">Week 24 (Bristol)</option>
                        <option value="twenty-five" data-show=".week25">Week 25 (Darlington)</option>
                        <option value="twenty-six" data-show=".week26">Week 26 (Richmond)</option>
                    </select>
                    <h3 style="color: #fff;text-align: center;">Scoreboard</h3>
                </div>
            </div>

            <div class="row">     

                <!-- WEEK 1 RESULTS -->  
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week1 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_1_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[0]->get_points() > $week_1_teams[1]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[0]->get_points() < $week_1_teams[1]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_1_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_1_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[0]->get_points() < $week_1_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[0]->get_points() > $week_1_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_1_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_1_teams[1]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>                          
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week1 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_1_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[2]->get_points() > $week_1_teams[3]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[2]->get_points() < $week_1_teams[3]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_1_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_1_teams[2]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[2]->get_points() < $week_1_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[2]->get_points() > $week_1_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_1_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_1_teams[3]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>                          
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week1 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_1_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[4]->get_points() > $week_1_teams[5]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[4]->get_points() < $week_1_teams[5]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_1_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_1_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[4]->get_points() < $week_1_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[4]->get_points() > $week_1_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_1_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_1_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>                          
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week1 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_1_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[6]->get_points() > $week_1_teams[7]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[6]->get_points() < $week_1_teams[7]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_1_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_1_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[6]->get_points() < $week_1_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[6]->get_points() > $week_1_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_1_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_1_teams[7]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>                          
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week1 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_1_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[8]->get_points() > $week_1_teams[9]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[8]->get_points() < $week_1_teams[9]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_1_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_1_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_1_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_1_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_1_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_1_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_1_teams[8]->get_points() < $week_1_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_1_teams[8]->get_points() > $week_1_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_1_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_1_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 1 RESULTS -->

                <!-- WEEK 2 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">
                    <div class="week2 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_2_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[7]->get_points() > $week_2_teams[3]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[7]->get_points() < $week_2_teams[3]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_2_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_2_teams[7]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[7]->get_points() < $week_2_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[7]->get_points() > $week_2_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_2_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_2_teams[3]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week2 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_2_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[6]->get_points() > $week_2_teams[9]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[6]->get_points() < $week_2_teams[9]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_2_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_2_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[6]->get_points() < $week_2_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[6]->get_points() > $week_2_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_2_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_2_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week2 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                       
                                <tr>
                                    <td><?php echo $week_2_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[4]->get_points() > $week_2_teams[8]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[4]->get_points() < $week_2_teams[8]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_2_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_2_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[4]->get_points() < $week_2_teams[8]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[4]->get_points() > $week_2_teams[8]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_2_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_2_teams[8]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week2 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_2_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[1]->get_points() > $week_2_teams[5]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[1]->get_points() < $week_2_teams[5]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_2_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_2_teams[1]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[1]->get_points() < $week_2_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[1]->get_points() > $week_2_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_2_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_2_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week2 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                    
                                <tr>
                                    <td><?php echo $week_2_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                      
                                </tr>
                                    <?php 
                                    if ($week_2_teams[0]->get_points() > $week_2_teams[2]->get_points()) {
                                        $team_standings[0]->get_team_standing()->add_win();
                                        echo '<tr style="border: 4px solid #00b300;">';
                                    } else {
                                        if ($week_2_teams[0]->get_points() < $week_2_teams[2]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_loss();
                                        }
                                        echo '<tr style="border: 4px solid white;">';
                                    }
                                    $team_standings[0]->get_team_standing()->add_pts($week_2_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_2_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_2_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_2_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_2_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_2_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_2_teams[0]->get_points() < $week_2_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_2_teams[0]->get_points() > $week_2_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_2_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_2_teams[2]->get_points(); ?></td>  
                                </tr>                     
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 2 RESULTS -->

                <!-- WEEK 3 RESULTS -->        
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week3 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_3_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[8]->get_points() > $week_3_teams[1]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[8]->get_points() < $week_3_teams[1]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_3_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_3_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[8]->get_points() < $week_3_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[8]->get_points() > $week_3_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_3_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_3_teams[1]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week3 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_3_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[0]->get_points() > $week_3_teams[7]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[0]->get_points() < $week_3_teams[7]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_3_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_3_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[0]->get_points() < $week_3_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[0]->get_points() > $week_3_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_3_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_3_teams[7]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week3 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                      
                                <tr>
                                    <td><?php echo $week_3_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[5]->get_points() > $week_3_teams[2]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[5]->get_points() < $week_3_teams[2]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_3_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_3_teams[5]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[5]->get_points() < $week_3_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[5]->get_points() > $week_3_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_3_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_3_teams[2]->get_points(); ?></td>  
                                </tr> 
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week3 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                              
                                <tr>
                                    <td><?php echo $week_3_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[6]->get_points() > $week_3_teams[3]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[6]->get_points() < $week_3_teams[3]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_3_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_3_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[6]->get_points() < $week_3_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[6]->get_points() > $week_3_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_3_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_3_teams[3]->get_points(); ?></td>  
                                </tr> 
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week3 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                       
                                <tr>
                                    <td><?php echo $week_3_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>                                          
                                    <?php
                                        if ($week_3_teams[9]->get_points() > $week_3_teams[4]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[9]->get_points() < $week_3_teams[4]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_3_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_3_teams[9]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_3_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_3_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_3_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_3_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_3_teams[9]->get_points() < $week_3_teams[4]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_3_teams[9]->get_points() > $week_3_teams[4]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_3_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_3_teams[4]->get_points(); ?></td>
                                </tr>                        
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 3 RESULTS -->

                <!-- WEEK 4 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week4 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                             
                                <tr>
                                    <td><?php echo $week_4_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[7]->get_points() > $week_4_teams[5]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[7]->get_points() < $week_4_teams[5]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_4_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_4_teams[7]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[7]->get_points() < $week_4_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[7]->get_points() > $week_4_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_4_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_4_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week4 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_4_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[6]->get_points() > $week_4_teams[0]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[6]->get_points() < $week_4_teams[0]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_4_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_4_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[6]->get_points() < $week_4_teams[0]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[6]->get_points() > $week_4_teams[0]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_4_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_4_teams[0]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week4 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_4_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[3]->get_points() > $week_4_teams[9]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[3]->get_points() < $week_4_teams[9]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_4_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_4_teams[3]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[3]->get_points() < $week_4_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[3]->get_points() > $week_4_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_4_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_4_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week4 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_4_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[2]->get_points() > $week_4_teams[8]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[2]->get_points() < $week_4_teams[8]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_4_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_4_teams[2]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[2]->get_points() < $week_4_teams[8]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[2]->get_points() > $week_4_teams[8]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_4_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_4_teams[8]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week4 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_4_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[1]->get_points() > $week_4_teams[4]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[1]->get_points() < $week_4_teams[4]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_4_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_4_teams[1]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_4_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_4_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_4_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_4_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_4_teams[1]->get_points() < $week_4_teams[4]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_4_teams[1]->get_points() > $week_4_teams[4]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_4_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_4_teams[4]->get_points(); ?></td>  
                                </tr> 
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 4 RESULTS -->

                <!-- WEEK 5 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week5 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                     
                                <tr>
                                    <td><?php echo $week_5_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[9]->get_points() > $week_5_teams[1]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[9]->get_points() < $week_5_teams[1]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_5_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_5_teams[9]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[9]->get_points() < $week_5_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[9]->get_points() > $week_5_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_5_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_5_teams[1]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week5 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                     
                                <tr>
                                    <td><?php echo $week_5_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[5]->get_points() > $week_5_teams[6]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[5]->get_points() < $week_5_teams[6]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_5_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_5_teams[5]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[5]->get_points() < $week_5_teams[6]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[5]->get_points() > $week_5_teams[6]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_5_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_5_teams[6]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week5 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                    
                                <tr>
                                    <td><?php echo $week_5_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[0]->get_points() > $week_5_teams[3]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[0]->get_points() < $week_5_teams[3]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_5_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_5_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[0]->get_points() < $week_5_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[0]->get_points() > $week_5_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_5_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_5_teams[3]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week5 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                     
                                <tr>
                                    <td><?php echo $week_5_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[4]->get_points() > $week_5_teams[2]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[4]->get_points() < $week_5_teams[2]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_5_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_5_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[4]->get_points() < $week_5_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[4]->get_points() > $week_5_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_5_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_5_teams[2]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week5 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                     
                                <tr>
                                    <td><?php echo $week_5_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[8]->get_points() > $week_5_teams[7]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[8]->get_points() < $week_5_teams[7]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_5_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_5_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_5_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_5_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_5_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_5_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_5_teams[8]->get_points() < $week_5_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_5_teams[8]->get_points() > $week_5_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_5_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_5_teams[7]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 5 RESULTS -->

                <!-- WEEK 6 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week6 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_6_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[0]->get_points() > $week_6_teams[9]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[0]->get_points() < $week_6_teams[9]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_6_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_6_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[0]->get_points() < $week_6_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[0]->get_points() > $week_6_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_6_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_6_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week6 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_6_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[6]->get_points() > $week_6_teams[8]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[6]->get_points() < $week_6_teams[8]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_6_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_6_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[6]->get_points() < $week_6_teams[8]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[6]->get_points() > $week_6_teams[8]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_6_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_6_teams[8]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week6 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_6_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[7]->get_points() > $week_6_teams[4]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[7]->get_points() < $week_6_teams[4]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_6_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_6_teams[7]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[7]->get_points() < $week_6_teams[4]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[7]->get_points() > $week_6_teams[4]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_6_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_6_teams[4]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week6 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_6_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[2]->get_points() > $week_6_teams[1]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[2]->get_points() < $week_6_teams[1]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_6_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_6_teams[2]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[2]->get_points() < $week_6_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[2]->get_points() > $week_6_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_6_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_6_teams[1]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week6 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_6_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[3]->get_points() > $week_6_teams[5]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[3]->get_points() < $week_6_teams[5]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_6_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_6_teams[3]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_6_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_6_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_6_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_6_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_6_teams[3]->get_points() < $week_6_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_6_teams[3]->get_points() > $week_6_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_6_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_6_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 6 RESULTS -->

                <!-- WEEK 7 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week7 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_7_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[1]->get_points() > $week_7_teams[7]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[1]->get_points() < $week_7_teams[7]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_7_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_7_teams[1]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[1]->get_points() < $week_7_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[1]->get_points() > $week_7_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_7_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_7_teams[7]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week7 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_7_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[8]->get_points() > $week_7_teams[3]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[8]->get_points() < $week_7_teams[3]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_7_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_7_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[8]->get_points() < $week_7_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[8]->get_points() > $week_7_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_7_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_7_teams[3]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week7 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_7_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[4]->get_points() > $week_7_teams[6]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[4]->get_points() < $week_7_teams[6]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_7_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_7_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[4]->get_points() < $week_7_teams[6]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[4]->get_points() > $week_7_teams[6]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_7_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_7_teams[6]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week7 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_7_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[9]->get_points() > $week_7_teams[2]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[9]->get_points() < $week_7_teams[2]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_7_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_7_teams[9]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[9]->get_points() < $week_7_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[9]->get_points() > $week_7_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_7_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_7_teams[2]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week7 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_7_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[5]->get_points() > $week_7_teams[0]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[5]->get_points() < $week_7_teams[0]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_7_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_7_teams[5]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_7_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_7_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_7_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_7_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_7_teams[5]->get_points() < $week_7_teams[0]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_7_teams[5]->get_points() > $week_7_teams[0]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }                                    
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_7_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_7_teams[0]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 7 RESULTS -->

                <!-- WEEK 8 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week8 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_8_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[0]->get_points() > $week_8_teams[8]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[0]->get_points() < $week_8_teams[8]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_8_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_8_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[0]->get_points() < $week_8_teams[8]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[0]->get_points() > $week_8_teams[8]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_8_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_8_teams[8]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week8 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_8_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[7]->get_points() > $week_8_teams[2]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[7]->get_points() < $week_8_teams[2]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_8_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_8_teams[7]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[7]->get_points() < $week_8_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[7]->get_points() > $week_8_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_8_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_8_teams[2]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week8 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_8_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[3]->get_points() > $week_8_teams[4]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[3]->get_points() < $week_8_teams[4]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_8_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_8_teams[3]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[3]->get_points() < $week_8_teams[4]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[3]->get_points() > $week_8_teams[4]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_8_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_8_teams[4]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week8 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_8_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[6]->get_points() > $week_8_teams[1]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[6]->get_points() < $week_8_teams[1]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_8_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_8_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[6]->get_points() < $week_8_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[6]->get_points() > $week_8_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_8_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_8_teams[1]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week8 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_8_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[5]->get_points() > $week_8_teams[9]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[5]->get_points() < $week_8_teams[9]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_8_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_8_teams[5]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_8_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_8_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_8_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_8_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_8_teams[5]->get_points() < $week_8_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_8_teams[5]->get_points() > $week_8_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }                                    
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_8_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_8_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 8 RESULTS -->

                <!-- WEEK 9 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week9 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_9_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[2]->get_points() > $week_9_teams[6]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[2]->get_points() < $week_9_teams[6]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_9_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_9_teams[2]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[2]->get_points() < $week_9_teams[6]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[2]->get_points() > $week_9_teams[6]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_9_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_9_teams[6]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week9 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_9_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[8]->get_points() > $week_9_teams[5]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[8]->get_points() < $week_9_teams[5]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_9_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_9_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[8]->get_points() < $week_9_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[8]->get_points() > $week_9_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_9_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_9_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week9 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_9_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[4]->get_points() > $week_9_teams[0]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[4]->get_points() < $week_9_teams[0]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_9_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_9_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[4]->get_points() < $week_9_teams[0]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[4]->get_points() > $week_9_teams[0]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_9_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_9_teams[0]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week9 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_9_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[9]->get_points() > $week_9_teams[7]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[9]->get_points() < $week_9_teams[7]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_9_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_9_teams[9]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[9]->get_points() < $week_9_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[9]->get_points() > $week_9_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_9_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_9_teams[7]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week9 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_9_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[1]->get_points() > $week_9_teams[3]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[1]->get_points() < $week_9_teams[3]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_9_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_9_teams[1]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_9_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_9_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_9_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_9_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_9_teams[1]->get_points() < $week_9_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_9_teams[1]->get_points() > $week_9_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }                                    
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_9_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_9_teams[3]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 9 RESULTS -->

                <!-- WEEK 10 RESULTS -->  
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week10 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_10_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[0]->get_points() > $week_10_teams[1]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[0]->get_points() < $week_10_teams[1]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_10_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_10_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[0]->get_points() < $week_10_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[0]->get_points() > $week_10_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_10_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_10_teams[1]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>                          
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week10 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_10_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[2]->get_points() > $week_10_teams[3]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[2]->get_points() < $week_10_teams[3]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_10_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_10_teams[2]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[2]->get_points() < $week_10_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[2]->get_points() > $week_10_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_10_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_10_teams[3]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>                          
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week10 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_10_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[4]->get_points() > $week_10_teams[5]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[4]->get_points() < $week_10_teams[5]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_10_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_10_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[4]->get_points() < $week_10_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[4]->get_points() > $week_10_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_10_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_10_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>                          
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week10 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_10_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[6]->get_points() > $week_10_teams[7]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[6]->get_points() < $week_10_teams[7]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_10_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_10_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[6]->get_points() < $week_10_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[6]->get_points() > $week_10_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_10_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_10_teams[7]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>                          
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week10 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_10_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[8]->get_points() > $week_10_teams[9]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[8]->get_points() < $week_10_teams[9]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_10_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_10_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_10_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_10_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_10_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_10_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_10_teams[8]->get_points() < $week_10_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_10_teams[8]->get_points() > $week_10_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_10_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_10_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 10 RESULTS -->

                <!-- WEEK 11 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">
                    <div class="week11 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_11_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[7]->get_points() > $week_11_teams[3]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[7]->get_points() < $week_11_teams[3]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_11_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_11_teams[7]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[7]->get_points() < $week_11_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[7]->get_points() > $week_11_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_11_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_11_teams[3]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week11 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_11_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[6]->get_points() > $week_11_teams[9]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[6]->get_points() < $week_11_teams[9]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_11_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_11_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[6]->get_points() < $week_11_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[6]->get_points() > $week_11_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_11_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_11_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week11 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                       
                                <tr>
                                    <td><?php echo $week_11_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[4]->get_points() > $week_11_teams[8]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[4]->get_points() < $week_11_teams[8]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_11_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_11_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[4]->get_points() < $week_11_teams[8]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[4]->get_points() > $week_11_teams[8]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_11_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_11_teams[8]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week11 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_11_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[1]->get_points() > $week_11_teams[5]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[1]->get_points() < $week_11_teams[5]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_11_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_11_teams[1]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[1]->get_points() < $week_11_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[1]->get_points() > $week_11_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_11_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_11_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week11 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                    
                                <tr>
                                    <td><?php echo $week_11_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                      
                                </tr>
                                    <?php 
                                    if ($week_11_teams[0]->get_points() > $week_11_teams[2]->get_points()) {
                                        $team_standings[0]->get_team_standing()->add_win();
                                        echo '<tr style="border: 4px solid #00b300;">';
                                    } else {
                                        if ($week_11_teams[0]->get_points() < $week_11_teams[2]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_loss();
                                        }
                                        echo '<tr style="border: 4px solid white;">';
                                    }
                                    $team_standings[0]->get_team_standing()->add_pts($week_11_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_11_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_11_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_11_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_11_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_11_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_11_teams[0]->get_points() < $week_11_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_11_teams[0]->get_points() > $week_11_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_11_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_11_teams[2]->get_points(); ?></td>  
                                </tr>                     
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 11 RESULTS -->

                <!-- WEEK 12 RESULTS -->        
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week12 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_12_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[8]->get_points() > $week_12_teams[1]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[8]->get_points() < $week_12_teams[1]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_12_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_12_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[8]->get_points() < $week_12_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[8]->get_points() > $week_12_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_12_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_12_teams[1]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week12 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_12_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[0]->get_points() > $week_12_teams[7]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[0]->get_points() < $week_12_teams[7]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_12_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_12_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[0]->get_points() < $week_12_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[0]->get_points() > $week_12_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_12_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_12_teams[7]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week12 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                      
                                <tr>
                                    <td><?php echo $week_12_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[5]->get_points() > $week_12_teams[2]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[5]->get_points() < $week_12_teams[2]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_12_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_12_teams[5]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[5]->get_points() < $week_12_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[5]->get_points() > $week_12_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_12_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_12_teams[2]->get_points(); ?></td>  
                                </tr> 
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week12 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                              
                                <tr>
                                    <td><?php echo $week_12_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[6]->get_points() > $week_12_teams[3]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[6]->get_points() < $week_12_teams[3]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_12_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_12_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[6]->get_points() < $week_12_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[6]->get_points() > $week_12_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_12_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_12_teams[3]->get_points(); ?></td>  
                                </tr> 
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">
                    <div class="week12 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                       
                                <tr>
                                    <td><?php echo $week_12_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>                                          
                                    <?php
                                        if ($week_12_teams[9]->get_points() > $week_12_teams[4]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[9]->get_points() < $week_12_teams[4]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_12_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_12_teams[9]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_12_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_12_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_12_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_12_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_12_teams[9]->get_points() < $week_12_teams[4]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_12_teams[9]->get_points() > $week_12_teams[4]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_12_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_12_teams[4]->get_points(); ?></td>
                                </tr>                        
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 12 RESULTS -->

                <!-- WEEK 13 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week13 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                             
                                <tr>
                                    <td><?php echo $week_13_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[7]->get_points() > $week_13_teams[5]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[7]->get_points() < $week_13_teams[5]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_13_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_13_teams[7]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[7]->get_points() < $week_13_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[7]->get_points() > $week_13_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_13_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_13_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week13 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_13_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[6]->get_points() > $week_13_teams[0]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[6]->get_points() < $week_13_teams[0]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_13_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_13_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[6]->get_points() < $week_13_teams[0]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[6]->get_points() > $week_13_teams[0]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_13_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_13_teams[0]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week13 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_13_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[3]->get_points() > $week_13_teams[9]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[3]->get_points() < $week_13_teams[9]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_13_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_13_teams[3]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[3]->get_points() < $week_13_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[3]->get_points() > $week_13_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_13_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_13_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week13 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_13_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[2]->get_points() > $week_13_teams[8]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[2]->get_points() < $week_13_teams[8]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_13_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_13_teams[2]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[2]->get_points() < $week_13_teams[8]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[2]->get_points() > $week_13_teams[8]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_13_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_13_teams[8]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week13 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_13_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[1]->get_points() > $week_13_teams[4]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[1]->get_points() < $week_13_teams[4]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_13_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_13_teams[1]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_13_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_13_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_13_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_13_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_13_teams[1]->get_points() < $week_13_teams[4]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_13_teams[1]->get_points() > $week_13_teams[4]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_13_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_13_teams[4]->get_points(); ?></td>  
                                </tr> 
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 13 RESULTS -->

                <!-- WEEK 14 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week14 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                     
                                <tr>
                                    <td><?php echo $week_14_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[9]->get_points() > $week_14_teams[1]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[9]->get_points() < $week_14_teams[1]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_14_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_14_teams[9]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[9]->get_points() < $week_14_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[9]->get_points() > $week_14_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_14_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_14_teams[1]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week14 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                     
                                <tr>
                                    <td><?php echo $week_14_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[5]->get_points() > $week_14_teams[6]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[5]->get_points() < $week_14_teams[6]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_14_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_14_teams[5]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[5]->get_points() < $week_14_teams[6]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[5]->get_points() > $week_14_teams[6]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_14_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_14_teams[6]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week14 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                    
                                <tr>
                                    <td><?php echo $week_14_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[0]->get_points() > $week_14_teams[3]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[0]->get_points() < $week_14_teams[3]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_14_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_14_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[0]->get_points() < $week_14_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[0]->get_points() > $week_14_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_14_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_14_teams[3]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week14 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                     
                                <tr>
                                    <td><?php echo $week_14_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[4]->get_points() > $week_14_teams[2]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[4]->get_points() < $week_14_teams[2]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_14_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_14_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[4]->get_points() < $week_14_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[4]->get_points() > $week_14_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_14_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_14_teams[2]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week14 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>                                                                     
                                <tr>
                                    <td><?php echo $week_14_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[8]->get_points() > $week_14_teams[7]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[8]->get_points() < $week_14_teams[7]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_14_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_14_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_14_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_14_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_14_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_14_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_14_teams[8]->get_points() < $week_14_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_14_teams[8]->get_points() > $week_14_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_14_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_14_teams[7]->get_points(); ?></td>  
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 14 RESULTS -->

                <!-- WEEK 15 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week15 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_15_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[0]->get_points() > $week_15_teams[9]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[0]->get_points() < $week_15_teams[9]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_15_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_15_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[0]->get_points() < $week_15_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[0]->get_points() > $week_15_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_15_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_15_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week15 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_15_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[6]->get_points() > $week_15_teams[8]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[6]->get_points() < $week_15_teams[8]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_15_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_15_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[6]->get_points() < $week_15_teams[8]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[6]->get_points() > $week_15_teams[8]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_15_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_15_teams[8]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week15 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_15_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[7]->get_points() > $week_15_teams[4]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[7]->get_points() < $week_15_teams[4]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_15_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_15_teams[7]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[7]->get_points() < $week_15_teams[4]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[7]->get_points() > $week_15_teams[4]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_15_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_15_teams[4]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week15 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_15_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[2]->get_points() > $week_15_teams[1]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[2]->get_points() < $week_15_teams[1]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_15_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_15_teams[2]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[2]->get_points() < $week_15_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[2]->get_points() > $week_15_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_15_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_15_teams[1]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week15 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_15_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[3]->get_points() > $week_15_teams[5]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[3]->get_points() < $week_15_teams[5]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_15_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_15_teams[3]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_15_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_15_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_15_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_15_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_15_teams[3]->get_points() < $week_15_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_15_teams[3]->get_points() > $week_15_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_15_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_15_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 15 RESULTS -->

                <!-- WEEK 16 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week16 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_16_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[1]->get_points() > $week_16_teams[7]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[1]->get_points() < $week_16_teams[7]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_16_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_16_teams[1]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[1]->get_points() < $week_16_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[1]->get_points() > $week_16_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_16_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_16_teams[7]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week16 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_16_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[8]->get_points() > $week_16_teams[3]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[8]->get_points() < $week_16_teams[3]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_16_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_16_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[8]->get_points() < $week_16_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[8]->get_points() > $week_16_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_16_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_16_teams[3]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week16 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_16_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[4]->get_points() > $week_16_teams[6]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[4]->get_points() < $week_16_teams[6]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_16_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_16_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[4]->get_points() < $week_16_teams[6]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[4]->get_points() > $week_16_teams[6]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_16_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_16_teams[6]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week16 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_16_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[9]->get_points() > $week_16_teams[2]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[9]->get_points() < $week_16_teams[2]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_16_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_16_teams[9]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[9]->get_points() < $week_16_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[9]->get_points() > $week_16_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_16_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_16_teams[2]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week16 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_16_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[5]->get_points() > $week_16_teams[0]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[5]->get_points() < $week_16_teams[0]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_16_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_16_teams[5]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_16_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_16_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_16_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_16_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_16_teams[5]->get_points() < $week_16_teams[0]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_16_teams[5]->get_points() > $week_16_teams[0]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }                                    
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_16_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_16_teams[0]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 16 RESULTS -->

                <!-- WEEK 17 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week17 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_17_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[0]->get_points() > $week_17_teams[8]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[0]->get_points() < $week_17_teams[8]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_17_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_17_teams[0]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[0]->get_points() < $week_17_teams[8]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[0]->get_points() > $week_17_teams[8]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_17_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_17_teams[8]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week17 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_17_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[7]->get_points() > $week_17_teams[2]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[7]->get_points() < $week_17_teams[2]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_17_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_17_teams[7]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[7]->get_points() < $week_17_teams[2]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[7]->get_points() > $week_17_teams[2]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_17_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_17_teams[2]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week17 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_17_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[3]->get_points() > $week_17_teams[4]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[3]->get_points() < $week_17_teams[4]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_17_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_17_teams[3]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[3]->get_points() < $week_17_teams[4]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[3]->get_points() > $week_17_teams[4]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_17_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_17_teams[4]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week17 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_17_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[6]->get_points() > $week_17_teams[1]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[6]->get_points() < $week_17_teams[1]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_17_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_17_teams[6]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[6]->get_points() < $week_17_teams[1]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[6]->get_points() > $week_17_teams[1]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_17_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_17_teams[1]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week17 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_17_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[5]->get_points() > $week_17_teams[9]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[5]->get_points() < $week_17_teams[9]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_17_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_17_teams[5]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_17_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_17_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_17_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_17_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_17_teams[5]->get_points() < $week_17_teams[9]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_17_teams[5]->get_points() > $week_17_teams[9]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }                                    
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_17_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_17_teams[9]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 17 RESULTS -->

                <!-- WEEK 18 RESULTS -->
                <div class="my-scoreboard col-lg-2 col-lg-offset-1">            
                    <div class="week18 hide table-responsive scoreboard_space_first">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_18_teams[2]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[2]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[2]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[2]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[2]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[2]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[2]->get_points() > $week_18_teams[6]->get_points()) {
                                            $team_standings[2]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[2]->get_points() < $week_18_teams[6]->get_points()) {
                                                $team_standings[2]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[2]->get_team_standing()->add_pts($week_18_teams[2]->get_points());
                                    ?>
                                    <td>Team Joey</td>
                                    <td><?php echo $week_18_teams[2]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[6]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[6]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[6]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[6]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[6]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[6]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[2]->get_points() < $week_18_teams[6]->get_points()) {
                                            $team_standings[6]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[2]->get_points() > $week_18_teams[6]->get_points()) {
                                                $team_standings[6]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[6]->get_team_standing()->add_pts($week_18_teams[6]->get_points());
                                    ?>
                                    <td>Team Jru</td>
                                    <td><?php echo $week_18_teams[6]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week18 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_18_teams[8]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[8]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[8]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[8]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[8]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[8]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[8]->get_points() > $week_18_teams[5]->get_points()) {
                                            $team_standings[8]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[8]->get_points() < $week_18_teams[5]->get_points()) {
                                                $team_standings[8]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[8]->get_team_standing()->add_pts($week_18_teams[8]->get_points());
                                    ?>
                                    <td>Team Matt</td>
                                    <td><?php echo $week_18_teams[8]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[5]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[5]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[5]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[5]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[5]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[5]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[8]->get_points() < $week_18_teams[5]->get_points()) {
                                            $team_standings[5]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[8]->get_points() > $week_18_teams[5]->get_points()) {
                                                $team_standings[5]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[5]->get_team_standing()->add_pts($week_18_teams[5]->get_points());
                                    ?>
                                    <td>Team Docks</td>
                                    <td><?php echo $week_18_teams[5]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week18 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_18_teams[4]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[4]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[4]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[4]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[4]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[4]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[4]->get_points() > $week_18_teams[0]->get_points()) {
                                            $team_standings[4]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[4]->get_points() < $week_18_teams[0]->get_points()) {
                                                $team_standings[4]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[4]->get_team_standing()->add_pts($week_18_teams[4]->get_points());
                                    ?>
                                    <td>Team Nick</td>
                                    <td><?php echo $week_18_teams[4]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[0]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[0]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[0]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[0]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[0]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[0]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[4]->get_points() < $week_18_teams[0]->get_points()) {
                                            $team_standings[0]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[4]->get_points() > $week_18_teams[0]->get_points()) {
                                                $team_standings[0]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[0]->get_team_standing()->add_pts($week_18_teams[0]->get_points());
                                    ?>
                                    <td>Team Donna</td>
                                    <td><?php echo $week_18_teams[0]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week18 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_18_teams[9]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[9]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[9]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[9]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[9]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[9]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[9]->get_points() > $week_18_teams[7]->get_points()) {
                                            $team_standings[9]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[9]->get_points() < $week_18_teams[7]->get_points()) {
                                                $team_standings[9]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[9]->get_team_standing()->add_pts($week_18_teams[9]->get_points());
                                    ?>
                                    <td>Team Chives</td>
                                    <td><?php echo $week_18_teams[9]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[7]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[7]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[7]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[7]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[7]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[7]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[9]->get_points() < $week_18_teams[7]->get_points()) {
                                            $team_standings[7]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[9]->get_points() > $week_18_teams[7]->get_points()) {
                                                $team_standings[7]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[7]->get_team_standing()->add_pts($week_18_teams[7]->get_points());
                                    ?>
                                    <td>The Young and the Fearless</td>
                                    <td><?php echo $week_18_teams[7]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>

                <div class="my-scoreboard col-lg-2">            
                    <div class="week18 hide table-responsive scoreboard_space">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                            <thead>
                                <tr>                                           
                                    <th width="80%">Lineup</th>
                                    <th width="20%">Points</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $week_18_teams[1]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[1]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[1]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[1]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[1]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[1]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[1]->get_points() > $week_18_teams[3]->get_points()) {
                                            $team_standings[1]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[1]->get_points() < $week_18_teams[3]->get_points()) {
                                                $team_standings[1]->get_team_standing()->add_loss();
                                            }
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[1]->get_team_standing()->add_pts($week_18_teams[1]->get_points());
                                    ?>
                                    <td>Team Rachel</td>
                                    <td><?php echo $week_18_teams[1]->get_points(); ?></td>  
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[3]->get_driver(1); ?></td>
                                    <td><?php echo $week_18_teams[3]->get_driver_points(1); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[3]->get_driver(2); ?></td>
                                    <td><?php echo $week_18_teams[3]->get_driver_points(2); ?></td>  
                                </tr>
                                <tr>
                                    <td><?php echo $week_18_teams[3]->get_driver(3); ?></td>
                                    <td><?php echo $week_18_teams[3]->get_driver_points(3); ?></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size: 11px">Total</td>                       
                                </tr>
                                    <?php
                                        if ($week_18_teams[1]->get_points() < $week_18_teams[3]->get_points()) {
                                            $team_standings[3]->get_team_standing()->add_win();
                                            echo '<tr style="border: 4px solid #00b300;">';
                                        } else {
                                            if ($week_18_teams[1]->get_points() > $week_18_teams[3]->get_points()) {
                                                $team_standings[3]->get_team_standing()->add_loss();
                                            }                                    
                                            echo '<tr style="border: 4px solid white;">';
                                        }
                                        $team_standings[3]->get_team_standing()->add_pts($week_18_teams[3]->get_points());
                                    ?>
                                    <td>Team Mike</td>
                                    <td><?php echo $week_18_teams[3]->get_points(); ?></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>           
                </div>
                <!-- END WEEK 18 RESULTS -->
            </div>
        </div>

        <div id="tab3" class="tab-pane fade">
            <div class="row top_margin">
                <div class="standings col-lg-4">
                    <h3 style="color: #fff;text-align: center;">Standings</h3>
                    <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">
                        <thead>
                            <tr>                                        
                                <th width="50%" style="border-right: 1px solid white">Team</th>
                                <th width="15%" style="border-right: 1px solid white">Wins</th>
                                <th width="15%" style="border-right: 1px solid white">Losses</th>
                                <th width="20%" style="border-right: 1px solid white">Points</th>                    
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                function sort_standings($a,$b) {
                                    if ($a->get_team_standing()->get_wins() == $b->get_team_standing()->get_wins()) {
                                        return ($a->get_team_standing()->get_total_pts() > $b->get_team_standing()->get_total_pts()) ? -1 : 1;
                                    } else {
                                        return ($a->get_team_standing()->get_wins() > $b->get_team_standing()->get_wins()) ? -1 : 1;
                                    }                           
                                }

                                usort($team_standings, "sort_standings");

                                $j = 0;
                                while ($j < 10) {

                                    echo '<tr><td style="border-right: 1px solid white">';
                                    echo $team_standings[$j]->get_team_standing()->get_team_name();
                                    echo '</td><td style="border-right: 1px solid white">';
                                    echo $team_standings[$j]->get_team_standing()->get_wins();
                                    echo '</td><td style="border-right: 1px solid white">';
                                    echo $team_standings[$j]->get_team_standing()->get_losses();
                                    echo '</td><td style="border-right: 1px solid white">';
                                    echo $team_standings[$j]->get_team_standing()->get_total_pts();
                                    echo '</td></tr>';


                                    $j++;
                                }

                            ?>
                                             
                        </tbody>
                    </table>
                </div>

                <div class="fantasy_pts_leaderboard col-lg-4 col-lg-offset-1">
                    <h3 style="color: #fff;text-align: center;">Fantasy Points Leaderboard</h3>
                    <div style="height:500px; overflow-y: scroll; margin-bottom: 40px;border: 2px solid #fff;">
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;margin-bottom: 0px;">
                            <thead>
                                <tr>
                                    <th width="2%" style="border-right: 1px solid white">Rank</th>                                        
                                    <th width="56%" style="border-right: 1px solid white">Driver</th>
                                    <th width="20%" style="border-right: 1px solid white">Points</th>
                                    <th width="20%" style="border-right: 1px solid white">Avg per Start</th>
                                    <th width="2%">Starts</th>                     
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                function sort_total_fantasy_pts($a,$b) {
                                    if ($a->get_season_pts() == $b->get_season_pts()) {
                                        return 0;
                                    } else {
                                        return ($a->get_season_pts() > $b->get_season_pts()) ? -1 : 1;
                                    }
                                }

                                usort($season_drivers, "sort_total_fantasy_pts");

                                $temp_pts = 0;
                                $i = 0;
                                $break = 0;
                                $tied = false;
                                while ($i < 46) {

                                    $next = ($i < 45) ? 1 : 0;
                                    $next += $i;
                                    if ($season_drivers[$i]->get_season_pts() == $season_drivers[$next]->get_season_pts()) {
                                        $tied = true;
                                    } else {
                                        $tied = false;
                                    }

                                    $rank = $i + 1;
                                    if ($season_drivers[$i]->get_season_pts() == $temp_pts) {
                                        $break++;
                                        $rank -= $break;
                                        $tied = true;
                                    } else {
                                        $break = 0;
                                    }

                                    if ($rank == 46) {
                                        $tied = false;
                                    }

                                    echo '<tr><td style="border-right: 1px solid white">';
                                    echo ($tied) ? 'T-'.$rank : $rank;
                                    echo '</td><td style="border-right: 1px solid white">';
                                    echo $season_drivers[$i]->get_name();
                                    echo '</td><td style="border-right: 1px solid white">';
                                    echo $season_drivers[$i]->get_season_pts();
                                    echo '</td><td style="border-right: 1px solid white">';
                                    echo $season_drivers[$i]->get_avg_pts();
                                    echo '</td><td>';
                                    echo $season_drivers[$i]->get_starts();
                                    echo '</td></tr>';

                                    if ($i == 0) {
                                        $driver_rank = array($season_drivers[$i]->get_name() => $rank);
                                    } else {
                                        $driver_rank = array_merge($driver_rank, array($season_drivers[$i]->get_name() => $rank));
                                    }
                                    

                                    $temp_pts = $season_drivers[$i]->get_season_pts();
                                    $i++;
                                } 
                                ?>

                            </tbody>

                        </table>
                    </div>          
                </div>               
            </div>
        </div>

        <div id="tab4" class="tab-pane fade">
            <div class="row">

                <?php

                for ($i = 0; $i < 4; $i++) {
                    //echo ($i == 0) ? '<div class="col-lg-2 col-lg-offset-1"><h3 style="color: white; text-align: center;">' : '<div class="col-lg-2"><h3 style="color: white; text-align: center;">';
                    echo '<div class="col-lg-3"><h2 style="color: white; text-align: center;">';
                    echo $team_roster[$i]->get_team_standing()->get_team_name();
                    echo '</h2><div class="table-responsive"><table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">';
                    echo '<thead><tr><th width="70%" style="border-right:1px solid white;background-color:#393e44;">Starting Drivers</th><th width="30%" style="background-color:#393e44;">Pts Rank</th></tr></thead><tbody><tr><td style="border-right:1px solid white;">';
                    echo $team_roster[$i]->get_driver(1);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(1)];
                    echo '</td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_driver(2);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(2)];
                    echo '</td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_driver(3);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(3)];
                    echo '</td></tr><tr><td style="border: 3px solid white; border-right: none;background-color:#393e44;">Bench Driver</td><td style="border: 3px solid white; border-left: none;background-color:#393e44;"></td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_fourth_driver();
                    echo '</td><td>';
                    echo (array_key_exists($team_roster[$i]->get_fourth_driver(), $driver_rank)) ? $driver_rank[$team_roster[$i]->get_fourth_driver()] : 'N/A';
                    echo '</td></tr></tbody></table></div></div>';
                }

                ?>
                   
            </div>

            <div class="row">

                <?php

                for ($i = 4; $i < 8; $i++) {
                    //echo ($i == 0) ? '<div class="col-lg-2 col-lg-offset-1"><h3 style="color: white; text-align: center;">' : '<div class="col-lg-2"><h3 style="color: white; text-align: center;">';
                    echo '<div class="col-lg-3"><h2 style="color: white; text-align: center;">';
                    echo $team_roster[$i]->get_team_standing()->get_team_name();
                    echo '</h2><div class="table-responsive"><table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">';
                    echo '<thead><tr><th width="70%" style="border-right:1px solid white;background-color:#393e44;">Starting Drivers</th><th width="30%" style="background-color:#393e44;">Pts Rank</th></tr></thead><tbody><tr><td style="border-right:1px solid white;">';
                    echo $team_roster[$i]->get_driver(1);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(1)];
                    echo '</td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_driver(2);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(2)];
                    echo '</td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_driver(3);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(3)];
                    echo '</td></tr><tr><td style="border: 3px solid white; border-right: none;background-color:#393e44;">Bench Driver</td><td style="border: 3px solid white; border-left: none;background-color:#393e44;"></td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_fourth_driver();
                    echo '</td><td>';
                    echo (array_key_exists($team_roster[$i]->get_fourth_driver(), $driver_rank)) ? $driver_rank[$team_roster[$i]->get_fourth_driver()] : 'N/A';
                    echo '</td></tr></tbody></table></div></div>';
                }

                ?>
                   
            </div>

            <div class="row">

                <?php

                for ($i = 8; $i < 10; $i++) {
                    echo ($i == 8) ? '<div class="col-lg-3 col-lg-offset-3"><h2 style="color: white; text-align: center;">' : '<div class="col-lg-3"><h2 style="color: white; text-align: center;">';
                    //echo '<div class="col-lg-3"><h3 style="color: white; text-align: center;">';
                    echo $team_roster[$i]->get_team_standing()->get_team_name();
                    echo '</h2><div class="table-responsive"><table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;">';
                    echo '<thead><tr><th width="70%" style="border-right:1px solid white;background-color:#393e44;">Starting Drivers</th><th width="30%" style="background-color:#393e44;">Pts Rank</th></tr></thead><tbody><tr><td style="border-right:1px solid white;">';
                    echo $team_roster[$i]->get_driver(1);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(1)];
                    echo '</td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_driver(2);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(2)];
                    echo '</td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_driver(3);
                    echo '</td><td>';
                    echo $driver_rank[$team_roster[$i]->get_driver(3)];
                    echo '</td></tr><tr><td style="border: 3px solid white; border-right: none;background-color:#393e44;">Bench Driver</td><td style="border: 3px solid white; border-left: none;background-color:#393e44;"></td></tr><tr><td style="border-right: 1px solid white;">';
                    echo $team_roster[$i]->get_fourth_driver();
                    echo '</td><td>';
                    echo (array_key_exists($team_roster[$i]->get_fourth_driver(), $driver_rank)) ? $driver_rank[$team_roster[$i]->get_fourth_driver()] : 'N/A';
                    echo '</td></tr></tbody></table></div></div>';
                }

                ?>
                   
            </div>
        </div>
    </div>   
</div>    

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/toggle_nascar_scoreboard.js"></script>

</body>
</html>