<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Nascar</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link href="css/HSFM.css" rel="stylesheet">
    <link href="css/fantasy_nascar.css" rel="stylesheet">
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
          <a class="navbar-brand" data-toggle="tab" href="#tab1" style="font-style: italic; color: #4286f4;"><span style="color: yellow;">Fantasy</span><span style="color: red;">Nascar</span>League</a>
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
                        <h3 style="color: #fff;text-align: center;">
                        <?php
                            $tracksplit = 'track-split';
                            $xml = simplexml_load_file("sprint_cup_drivers.xml");
                            echo "Bristol Motor Speedway Driver Splits";
                        ?>                          
                        </h3>
                        <div class="table-responsive" style="border-right: 3px solid #fff; margin-top: 20px;margin-bottom: 20px;">       
                        <table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;margin-bottom: 0px;">
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
                                    $i = 0;
                                    while ($i < 46) {
                                        $k = 0;
                                        $j = 0;
                                        foreach ($xml->season[0]->driver[$i]->$tracksplit->record as $record) {
                                            if ((string) $record['name'] == 'Bristol Motor Speedway') {
                                                $j = $k;
                                            }
                                            $k++;
                                        }

                                        echo "<tr>";

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
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>  
                </div>  
            </div>
            
            <div id="tab2" class="tab-pane fade">

                <?php include 'nascar_teams.php'; ?>

                <div class="row top_margin">
                    <div class="col-lg-2 col-lg-offset-5">
                        <select class="form-control" data-target=".my-scoreboard" id="theSelect">
                            <option value="one" data-show=".week1">Week 1 (Daytona)</option>
                            <option value="two" data-show=".week2">Week 2 (Atlanta)</option>
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
                            <option value="seventeen" data-show=".week17" selected="selected">Week 17 (Daytona)</option>
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
                    <?php                    
                        $i = 1;
                        while ($i <= 26) {

                            $j = 0;
                            if ($i < 10) {
                                $j = $i - 1;
                            } else if ($i < 19) {
                                $j = $i - 10;
                            } else {
                                $j = $i - 19;
                            }
                            get_matchups($teams_week, $i, $num_pairs[$j], $team_standings);

                            $i++;
                        }                   
                    ?>
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
                                    <th width="11%" style="border-right: 1px solid white">Wins</th>
                                    <th width="11%" style="border-right: 1px solid white">Losses</th>
                                    <th width="18%" style="border-right: 1px solid white">Points</th>
                                    <th width="10%" style="border-right: 1px solid white">Streak</th>                   
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

                                    $playoff_e_cutoff = $team_standings[4]->get_team_standing()->get_losses();
                                    $playoff_w_cutoff = $team_standings[2]->get_team_standing()->get_losses();
                                    $playoff_x_cutoff = $team_standings[5]->get_team_standing()->get_losses();
                                    $playoff_y_cutoff = $team_standings[3]->get_team_standing()->get_losses();
                                    $weeks_remaining = 26 - ($team_standings[4]->get_team_standing()->get_wins() + $team_standings[4]->get_team_standing()->get_losses());

                                    $j = 0;
                                    while ($j < 10) {

                                        echo ($j == 5) ? '<tr style="border: 3px solid white"><td colspan="5" style="font-weight:lighter; text-align: center; font-size:14px; margin: 0; padding: 1px;">Playoff Cutoff</td></tr><tr><td style="border-right: 1px solid white">' : '<tr><td style="border-right: 1px solid white">';                                       

                                        /* PLAYOFF CLINCH / ELIMINATION LOGIC */
                                        echo (($team_standings[$j]->get_team_standing()->get_losses() - $playoff_e_cutoff) > $weeks_remaining) ? "e - " : "";
                                        echo (($team_standings[$j]->get_team_standing()->get_losses() - $playoff_x_cutoff + $weeks_remaining) < 0 ) ? ((($team_standings[$j]->get_team_standing()->get_losses() - $playoff_y_cutoff + $weeks_remaining) < 0 ) ? "y - " : ((($team_standings[$j]->get_team_standing()->get_losses() - $playoff_w_cutoff) > $weeks_remaining) ? "w - " : "x - ")) : "";
                                        
                                        echo $team_standings[$j]->get_team_standing()->get_team_name();
                                        echo '</td><td style="border-right: 1px solid white">';
                                        echo $team_standings[$j]->get_team_standing()->get_wins();
                                        echo '</td><td style="border-right: 1px solid white">';
                                        echo $team_standings[$j]->get_team_standing()->get_losses();
                                        echo '</td><td style="border-right: 1px solid white">';
                                        echo $team_standings[$j]->get_team_standing()->get_total_pts();
                                        echo '</td><td style="border-right: 1px solid white">';
                                        echo $team_standings[$j]->get_team_standing()->get_streak();
                                        echo '</td></tr>';

                                        $j++;
                                        if ($j == 10) {
                                            echo '<tr style="border: 3px solid white"><td colspan="5" style="font-weight:lighter; font-size: 12px"> e -- Mathematically Eliminated From Playoffs</br>w -- Clinched Wild Card Berth</br>x -- Clinched Playoff Berth</br>y -- Clinched Top 3 Seed</td></tr>';
                                        }
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

                                        $next = ($i < 45) ? $i + 1 : $i + 0;
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
    <script src="js/toggle_nascar_scoreboard3.js"></script>
    <script>
        $(document).on('click','.navbar-collapse.in',function(e) {
            if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
                $(this).collapse('hide');
            }
        });  
    </script>

</body>
</html>