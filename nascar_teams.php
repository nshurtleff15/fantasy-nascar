<?php

class Team_Standing {

	var $name;
	var $streak;
	var $wins = 0;
	var $losses = 0;
	var $total_pts = 0;
	var $is_win = true;
	var $streak_num = 0;

	function __construct($name) {
		$this->name = $name;
	}

	function get_team_name() {
		return $this->name;
	}

	function get_wins() {
		return $this->wins;
	}

	function get_losses() {
		return $this->losses;
	}

	function get_total_pts() {
		return $this->total_pts;
	}

	function get_streak() {
		return $this->streak;
	}

	function add_win() {
		$this->wins++;
		$this->streak = $this->calculate_streak("win");
		$this->is_win=true;
	}

	function add_loss() {
		$this->losses++;
		$this->streak = $this->calculate_streak("loss");
		$this->is_win = false;
	}

	function add_pts($points) {
		$this->total_pts += $points;
	}

	function calculate_streak($outcome) {
		if ($this->is_win == true && $outcome == "win") {
			$this->streak_num++;
			return "W".$this->streak_num;
		} else if ($this->is_win == true && $outcome == "loss") {
			$this->streak_num = 1;
			return "L".$this->streak_num;
		} else if ($this->is_win == false && $outcome == "loss") {
			$this->streak_num++;
			return "L".$this->streak_num;
		} else if ($this->is_win == false && $outcome == "win") {
			$this->streak_num = 1;
			return "W".$this->streak_num;
		}
	}
}

class Season_Driver {

	var $name;
	var $season_pts = 0;
	var $starts = 0;

	function __construct($name) {
		$this->name = $name;
	}

	function add_season_pts($points) {
		$this->season_pts += $points;
	}

	function add_start() {
		$this->starts++;
	}
	function get_season_pts() {
		return $this->season_pts;
	}

	function get_starts() {
		return $this->starts;
	}

	function get_avg_pts() {
		return ($this->starts > 0) ? number_format((float)($this->season_pts / $this->starts), 1, '.', '') : number_format((float)0, 1, '.', '');
	}

	function get_name() {
		return $this->name;
	}
}

$matt_kenseth = new Season_Driver("Matt Kenseth");
$dale_earnhardt = new Season_Driver("Dale Earnhardt Jr");
$michael_mcdowell = new Season_Driver("Michael McDowell");
$joey_logano = new Season_Driver("Joey Logano");
$dj_kennington = new Season_Driver("D.J. Kennington");
$kyle_larson = new Season_Driver("Kyle Larson");
$ty_dillon = new Season_Driver("Ty Dillon");
$austin_dillon = new Season_Driver("Austin Dillon");
$ricky_stenhouse = new Season_Driver("Ricky Stenhouse Jr");
$aric_almirola = new Season_Driver("Aric Almirola");
$denny_hamlin = new Season_Driver("Denny Hamlin");
$chris_buescher = new Season_Driver("Chris Buescher");
$landon_cassill = new Season_Driver("Landon Cassill");
$alex_bowman = new Season_Driver("Alex Bowman");
$martin_truex = new Season_Driver("Martin Truex Jr");
$ryan_newman = new Season_Driver("Ryan Newman");
$brendan_gaughan = new Season_Driver("Brendan Gaughan");
$brad_keselowski = new Season_Driver("Brad Keselowski");
$erik_jones = new Season_Driver("Erik Jones");
$david_ragan = new Season_Driver("David Ragan");
$corey_lajoie = new Season_Driver("Corey Lajoie");
$cody_ware = new Season_Driver("Cody Ware");
$chase_elliott = new Season_Driver("Chase Elliott");
$joey_gase = new Season_Driver("Joey Gase");
$paul_menard = new Season_Driver("Paul Menard");
$kyle_busch = new Season_Driver("Kyle Busch");
$cole_whitt = new Season_Driver("Cole Whitt");
$reed_sorenson = new Season_Driver("Reed Sorenson");
$aj_allmendinger = new Season_Driver("AJ Allmendinger");
$elliott_sadler = new Season_Driver("Elliott Sadler");
$jamie_mcmurray = new Season_Driver("Jamie McMurray");
$kevin_harvick = new Season_Driver("Kevin Harvick");
$kasey_kahne = new Season_Driver("Kasey Kahne");
$daniel_suarez = new Season_Driver("Daniel Suarez");
$gray_gaulding = new Season_Driver("Gray Gaulding");
$ryan_blaney = new Season_Driver("Ryan Blaney");
$timmy_hill = new Season_Driver("Timmy Hill");
$michael_waltrip = new Season_Driver("Michael Waltrip");
$danica_patrick = new Season_Driver("Danica Patrick");
$trevor_bayne = new Season_Driver("Trevor Bayne");
$jimmie_johnson = new Season_Driver("Jimmie Johnson");
$clint_bowyer = new Season_Driver("Clint Bowyer");
$derrike_cope = new Season_Driver("Derrike Cope");
$jeffrey_earnhardt = new Season_Driver("Jeffrey Earnhardt");
$kurt_busch = new Season_Driver("Kurt Busch");
$matt_dibenedetto = new Season_Driver("Matt DiBenedetto");
$regan_smith = new Season_Driver("Regan Smith");
$bubba_wallace = new Season_Driver("Darrell Wallace Jr");

$season_drivers = array($matt_kenseth,$dale_earnhardt,$michael_mcdowell,$joey_logano,$dj_kennington,$kyle_larson,$ty_dillon,$austin_dillon,$ricky_stenhouse,$aric_almirola,$denny_hamlin,$chris_buescher,$landon_cassill,$alex_bowman,$martin_truex,$ryan_newman,$brendan_gaughan,$brad_keselowski,$erik_jones,$david_ragan,$corey_lajoie,$cody_ware,$chase_elliott,$joey_gase,$paul_menard,$kyle_busch,$cole_whitt,$reed_sorenson,$aj_allmendinger,$elliott_sadler,$jamie_mcmurray,$kevin_harvick,$kasey_kahne,$daniel_suarez,$gray_gaulding,$ryan_blaney,$timmy_hill,$michael_waltrip,$danica_patrick,$trevor_bayne,$jimmie_johnson,$clint_bowyer,$derrike_cope,$jeffrey_earnhardt,$kurt_busch,$matt_dibenedetto,$regan_smith,$bubba_wallace);


class Driver {

	var $name;
	var $pts = 0;

	function __construct($name) {
		$this->name = $name;
	}

	function get_driver() {
		return $this->name;
	}

	function set_driver_points($points) {
		$this->pts = $points;
	}

	function get_driver_points() {
		return $this->pts;
	}
}

class Team {

	var $drivers;
	var $points = 0;
	var $standing;
	var $fourth_driver;

	function __construct($team_name, $driver1, $driver2, $driver3, $driver4) {
		$drive1 = new Driver($driver1);
		$drive2 = new Driver($driver2);
		$drive3 = new Driver($driver3);
		$this->drivers = array($drive1, $drive2, $drive3);
		$this->standing = new Team_Standing($team_name);
		$this->fourth_driver = $driver4;
	}

	function get_driver($num) {
		$num--;
		return $this->drivers[$num]->get_driver();
	}

	function get_driver_points($num) {
		$num--;
		return $this->drivers[$num]->get_driver_points();
	}

	function get_drivers() {
		return $this->drivers;
	}

	function get_fourth_driver() {
		return $this->fourth_driver;
	}

	function set_points($pts) {
		$this->points = $pts;
	}

	function get_points() {
		return $this->points;
	}

	function get_team_standing() {
		return $this->standing;
	}
}

$team_nick = new Team("Team Nick","Kyle Busch","Jimmie Johnson","Jeffrey Earnhardt","Dummy");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Dummy");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Dummy");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Dummy");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Dummy");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Dummy");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","David Ragan","Dummy");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Michael Waltrip","Dummy");
$team_docks = new Team("Team Docks","Kasey Kahne","Ricky Stenhouse Jr","Danica Patrick","Dummy");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Dummy");

$week_1_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Jimmie Johnson","Jeffrey Earnhardt","Dummy");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Dummy");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Dummy");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Dummy");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Dummy");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Dummy");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","David Ragan","Dummy");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Dummy");
$team_docks = new Team("Team Docks","Kasey Kahne","Ricky Stenhouse Jr","AJ Allmendinger","Dummy");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Dummy");

$week_2_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Dummy");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Dummy");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Dummy");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Dummy");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Dummy");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Dummy");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","David Ragan","Dummy");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Dummy");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","Dummy");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Dummy");

$week_3_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Dummy");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Dummy");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Dummy");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Dummy");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Dummy");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Dummy");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","David Ragan","Dummy");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Dummy");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","Dummy");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Dummy");

$week_4_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Dummy");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Dummy");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Dummy");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Dummy");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Dummy");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Dummy");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","David Ragan","Dummy");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Dummy");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","Dummy");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Dummy");

$week_5_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Dummy");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Dummy");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Dummy");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Dummy");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Dummy");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Dummy");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","David Ragan","Dummy");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Dummy");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","Dummy");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Dummy");

$week_6_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Dummy");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Dummy");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Dummy");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Dummy");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Dummy");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Dummy");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","David Ragan","Dummy");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Dummy");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","Dummy");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Dummy");

$week_7_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Dummy");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Dummy");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Dummy");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Dummy");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Dummy");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Dummy");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","Dummy");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Dummy");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","Dummy");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Dummy");

$week_8_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Alex Bowman");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_9_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Alex Bowman");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_10_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Aric Almirola","Alex Bowman");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_11_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_12_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Regan Smith","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_13_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_14_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Jeffrey Earnhardt","Gray Gaulding");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_15_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_16_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Jeffrey Earnhardt","Gray Gaulding");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_17_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_18_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_19_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_20_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_21_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_22_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_23_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_24_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_25_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$team_nick = new Team("Team Nick","Kyle Busch","Kasey Kahne","AJ Allmendinger","Jeff Gordon");
$team_jru = new Team("Team Jru","Kevin Harvick","Ryan Newman","Paul Menard","Casey Mears");
$team_jim = new Team("The Young and the Fearless","Chase Elliott","Erik Jones","Trevor Bayne","Cole Whitt");
$team_matt = new Team("Team Matt","Brad Keselowski","Austin Dillon","Ryan Blaney","Carl Edwards");
$team_joey = new Team("Team Joey","Martin Truex Jr","Jamie McMurray","Darrell Wallace Jr","Aric Almirola");
$team_rachel = new Team("Team Rachel","Joey Logano","Matt Kenseth","Landon Cassill","Matt DiBenedetto");
$team_mike = new Team("Team Mike","Dale Earnhardt Jr","Ty Dillon","Chris Buescher","David Ragan");
$team_chives = new Team("Team Chives","Kurt Busch","Kyle Larson","Gray Gaulding","Jeffrey Earnhardt");
$team_docks = new Team("Team Docks","Jimmie Johnson","Ricky Stenhouse Jr","Danica Patrick","-- Empty --");
$team_donna = new Team("Team Donna","Denny Hamlin","Daniel Suarez","Clint Bowyer","Michael McDowell");

$week_26_teams = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);

$week_0_teams = array(); // DUMMY TEAM TO COVER INDEX 0 //
$teams_week = array($week_0_teams,$week_1_teams,$week_2_teams,$week_3_teams,$week_4_teams,$week_5_teams,$week_6_teams,$week_7_teams,$week_8_teams,$week_9_teams,$week_10_teams,$week_11_teams,$week_12_teams,$week_13_teams,$week_14_teams,$week_15_teams,$week_16_teams,$week_17_teams,$week_18_teams,$week_19_teams,$week_20_teams,$week_21_teams,$week_22_teams,$week_23_teams,$week_24_teams,$week_25_teams,$week_26_teams);

$team_standings = array($team_donna, $team_rachel, $team_joey, $team_mike, $team_nick, $team_docks, $team_jru, $team_jim, $team_matt, $team_chives);
$team_roster = $team_standings;
$driver_rank = array();


$pair1 = array(0,1);
$pair2 = array(2,3);
$pair3 = array(4,5);
$pair4 = array(6,7);
$pair5 = array(8,9);
$wk1_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$pair1 = array(7,3);
$pair2 = array(6,9);
$pair3 = array(4,8);
$pair4 = array(1,5);
$pair5 = array(0,2);
$wk2_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$pair1 = array(8,1);
$pair2 = array(0,7);
$pair3 = array(5,2);
$pair4 = array(6,3);
$pair5 = array(9,4);
$wk3_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$pair1 = array(7,5);
$pair2 = array(6,0);
$pair3 = array(3,9);
$pair4 = array(2,8);
$pair5 = array(1,4);
$wk4_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$pair1 = array(9,1);
$pair2 = array(5,6);
$pair3 = array(0,3);
$pair4 = array(4,2);
$pair5 = array(8,7);
$wk5_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$pair1 = array(0,9);
$pair2 = array(6,8);
$pair3 = array(7,4);
$pair4 = array(2,1);
$pair5 = array(3,5);
$wk6_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$pair1 = array(1,7);
$pair2 = array(8,3);
$pair3 = array(4,6);
$pair4 = array(9,2);
$pair5 = array(5,0);
$wk7_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$pair1 = array(0,8);
$pair2 = array(7,2);
$pair3 = array(3,4);
$pair4 = array(6,1);
$pair5 = array(5,9);
$wk8_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$pair1 = array(2,6);
$pair2 = array(8,5);
$pair3 = array(4,0);
$pair4 = array(9,7);
$pair5 = array(1,3);
$wk9_pairs = array($pair1,$pair2,$pair3,$pair4,$pair5);

$num_pairs = array($wk1_pairs,$wk2_pairs,$wk3_pairs,$wk4_pairs,$wk5_pairs,$wk6_pairs,$wk7_pairs,$wk8_pairs,$wk9_pairs);


/* FUNCTIONS */
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

                if ($data["stage_3_win"] == true) {
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
    
    foreach ($team->get_drivers() as $driver) {
        $driver_pts = 0;
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

function get_matchups($teams, $week, $num_pairs, $team_standings) {

    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);

    $k = 0;
    while ($k < 5) {
        $t1 = $num_pairs[$k][0];
        $t2 = $num_pairs[$k][1];
        echo '<div class="my-scoreboard is_';
        echo $f->format($week);
        echo ($k == 0) ? ' col-lg-2 col-lg-offset-1 hidden"><div class="week' : ' col-lg-2 hidden"><div class="week';
        echo $week;
        echo ' table-responsive ';
        echo ($k == 0) ? 'scoreboard_space_first">' : 'scoreboard_space">';
        echo '<table class="table" style="color: #fff; border: 3px solid #fff; background-color: #194775;"><thead><tr><th width="80%">Lineup</th><th width="20%">Points</th></tr></thead><tbody><tr><td>';
        echo $teams[$week][$t1]->get_driver(1);
        echo '</td><td>';
        echo $teams[$week][$t1]->get_driver_points(1);
        echo '</td></tr><tr><td>';
        echo $teams[$week][$t1]->get_driver(2);
        echo '</td><td>';
        echo $teams[$week][$t1]->get_driver_points(2);
        echo '</td></tr><tr><td>';
        echo $teams[$week][$t1]->get_driver(3);
        echo '</td><td>';
        echo $teams[$week][$t1]->get_driver_points(3);
        echo '</td></tr><tr><td></td><td style="font-size: 11px">Total</td></tr>';

        if ($teams[$week][$t1]->get_points() > $teams[$week][$t2]->get_points()) {
            $team_standings[$t1]->get_team_standing()->add_win();
            echo '<tr style="border: 4px solid #00b300;"><td>';
        } else {
            if ($teams[$week][$t1]->get_points() < $teams[$week][$t2]->get_points()) {
                $team_standings[$t1]->get_team_standing()->add_loss();
            }
            echo '<tr style="border: 4px solid white;"><td>';
        }
        $team_standings[$t1]->get_team_standing()->add_pts($teams[$week][$t1]->get_points());

        echo $teams[$week][$t1]->get_team_standing()->get_team_name();
        echo '</td><td>';
        echo $teams[$week][$t1]->get_points();

        echo '</td></tr><tr><td></td><td></br></td></tr><tr><td>';

        echo $teams[$week][$t2]->get_driver(1);
        echo '</td><td>';
        echo $teams[$week][$t2]->get_driver_points(1);
        echo '</td></tr><tr><td>';
        echo $teams[$week][$t2]->get_driver(2);
        echo '</td><td>';
        echo $teams[$week][$t2]->get_driver_points(2);
        echo '</td></tr><tr><td>';
        echo $teams[$week][$t2]->get_driver(3);
        echo '</td><td>';
        echo $teams[$week][$t2]->get_driver_points(3);
        echo '</td></tr><tr><td></td><td style="font-size: 11px">Total</td></tr>';

        if ($teams[$week][$t1]->get_points() < $teams[$week][$t2]->get_points()) {
            $team_standings[$t2]->get_team_standing()->add_win();
            echo '<tr style="border: 4px solid #00b300;"><td>';
        } else {
            if ($teams[$week][$t1]->get_points() > $teams[$week][$t2]->get_points()) {
                $team_standings[$t2]->get_team_standing()->add_loss();
            }
            echo '<tr style="border: 4px solid white;"><td>';
        }
        $team_standings[$t2]->get_team_standing()->add_pts($teams[$week][$t2]->get_points());

        echo $teams[$week][$t2]->get_team_standing()->get_team_name();
        echo '</td><td>';
        echo $teams[$week][$t2]->get_points();
        echo '</td></tr></tbody></table></div></div>';

        $k++;
    }
}

$k = 0;
while ($k < 10) {
    
    get_results($week_1_teams[$k], "daytona500_results.xml");
    get_results($week_2_teams[$k], "atlanta_results.xml");
    get_results($week_3_teams[$k], "las_vegas_results.xml");
    get_results($week_4_teams[$k], "phoenix_results.xml");
    get_results($week_5_teams[$k], "fontana_results.xml");
    get_results($week_6_teams[$k], "martinsville_results.xml");
    get_results($week_7_teams[$k], "texas_results.xml");
    get_results($week_8_teams[$k], "bristol_results.xml");
    get_results($week_9_teams[$k], "richmond_results.xml");
    get_results($week_10_teams[$k], "talladega_results.xml");
    get_results($week_11_teams[$k], "kansas_results.xml");
    get_results($week_12_teams[$k], "charlotte_results.xml");
    get_results($week_13_teams[$k], "dover_results.xml");
    get_results($week_14_teams[$k], "pocono_results.xml");
    get_results($week_15_teams[$k], "michigan_results.xml");
    get_results($week_16_teams[$k], "sonoma_results.xml");
    get_results($week_17_teams[$k], "daytona2_results.xml");
    get_results($week_18_teams[$k], "daytona2_results.xml");
    get_results($week_19_teams[$k], "daytona2_results.xml");
    get_results($week_20_teams[$k], "daytona2_results.xml");
    get_results($week_21_teams[$k], "daytona2_results.xml");
    get_results($week_22_teams[$k], "daytona2_results.xml");
    get_results($week_23_teams[$k], "daytona2_results.xml");
    get_results($week_24_teams[$k], "daytona2_results.xml");
    $k++;
}

get_season_points($season_drivers, "daytona500_results.xml");
get_season_points($season_drivers, "atlanta_results.xml");
get_season_points($season_drivers, "las_vegas_results.xml");
get_season_points($season_drivers, "phoenix_results.xml");
get_season_points($season_drivers, "fontana_results.xml");
get_season_points($season_drivers, "martinsville_results.xml");
get_season_points($season_drivers, "texas_results.xml");
get_season_points($season_drivers, "bristol_results.xml");
get_season_points($season_drivers, "richmond_results.xml");
get_season_points($season_drivers, "talladega_results.xml");
get_season_points($season_drivers, "kansas_results.xml");
get_season_points($season_drivers, "charlotte_results.xml");
get_season_points($season_drivers, "dover_results.xml");
get_season_points($season_drivers, "pocono_results.xml");
get_season_points($season_drivers, "michigan_results.xml");
get_season_points($season_drivers, "sonoma_results.xml");
get_season_points($season_drivers, "daytona2_results.xml");
get_season_points($season_drivers, "daytona2_results.xml");
get_season_points($season_drivers, "daytona2_results.xml");
get_season_points($season_drivers, "daytona2_results.xml");
get_season_points($season_drivers, "daytona2_results.xml");
get_season_points($season_drivers, "daytona2_results.xml");
get_season_points($season_drivers, "daytona2_results.xml");
get_season_points($season_drivers, "daytona2_results.xml");
?>