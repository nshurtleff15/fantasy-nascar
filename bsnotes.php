<li>
	<a href="bracket<?php if(is_array($bracket_div) && array_key_exists(0, $bracket_div)) {if($bracket_div[0] > 1) {echo 2;}}?>.php?bracket_id=<?php if(is_array($bracket_ids) && array_key_exists(0, $bracket_ids)) {echo htmlentities($bracket_ids[0]);}?>" id="b1" style="display: none"><?php echo htmlentities($brackets[0]);?>
		
	</a>
</li>




<?php 
if(is_array($bracket_div)) {
	if(array_key_exists(0, $bracket_div)) {
		if($bracket_div[0] > 1) {
			echo 2;
		}
	}
}  
	
}?>.php?bracket_id=<?php 
if(is_array($bracket_ids)) {
	if(array_key_exists(0, $bracket_ids)) {
		echo htmlentities($bracket_ids[0]);
	}
}?>








$getTeams = "SELECT * FROM d$bracket_div[0]_teams ORDER BY `seed` ASC";








<div class="bracket tb" id="d1" style="display: none; margin-bottom: 0px">
	<img src="helmets/NoViewBracketPic2.png">
</div>




