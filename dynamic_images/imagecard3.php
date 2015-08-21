<?php
$action_card[] = array('Primary','Run a Candidate of your choice in any primary ','Run a Candidate from the top of deck in any primary ');
$action_card[] = array('Election','Run a Candidate of your choice in any election ','Run a Candidate from the top of deck in any election ');
$action_card[] = array('Scandal','Player of your choice pays $10 or gains one skeleton ','the player with most skeletons, but not scandalized is scandalized. ');
$action_card[] = array('Debate','Make a debate roll in race of your choice ','Make a debate rool in a race of your choice ');
$action_card[] = array('Audit','Reveal the money cards under a candidate. ','Candidates with dirty money lose races ','Reveal your money cards. For every dirty money card, skel++ ');
$action_card[] = array('Super Pac','You may play one card on opponent\'s turns ','You may play one card on opponent\'s turns ');
$action_card[] = array('Fundraiser','Place two money cards under candidate of your choice ','Place two money cards under candidate of your choice ');
$action_card[] = array('Backdoor Deal','Purchase up to six action cards at $10 a card ','Discard an action card unless you pay $5 per card ');
$action_card[] = array('Rally','Remove up to two money cards from candidate of your choice ','Remove up to two money cards from candidate of your choice ');
$action_card[] = array('Media Blitz','Reroll an issue die ','Have an opponent reroll an issue die ');

$pattern = "/((.*? ){1,4})/";
$replacement = "$1 \n";

foreach($action_card as $action => $cards){
}

putenv("GDFONTPATH=" . realpath('.'));
$i = 0;

foreach($action_card as $action => $cards){

	$self = preg_replace($pattern, $replacement, $cards[1]);
	$opponent = preg_replace($pattern, $replacement, $cards[2]);

	$image = imagecreatetruecolor(200, 240);

	$image = imagecreatetruecolor(200, 240);
	$white = imagecolorallocate($image, 255, 255, 255);
	$darkred = imagecolorallocate($image, 64, 0, 0);
	$alpha_black = imagecolorallocatealpha($image, 0, 0, 0, 85);

	$black_style = imagecolorallocate($image, 0, 0, 0);
	$red_style = imagecolorallocate($image, 255, 128, 128);
	$orange_style = imagecolorallocate($image, 224, 160, 96);
	$blue_style = imagecolorallocate($image, 96, 208, 224);
	$green_style = imagecolorallocate($image, 176, 255, 144);
	$purple_style = imagecolorallocate($image, 176, 144, 255);
	imagefilledrectangle($image, 0, 0, 200, 40, $black_style);
	imagefilledrectangle($image, 0, 40, 200, 120, $red_style);
	imagefilledrectangle($image, 0, 120, 200, 200, $orange_style);


//	$text = "Military Contract Fraud";
	imagettftext($image, 14, 0, 10, 30, $white, 'Ubuntu-C.ttf', $cards[0]);
	imagettftext($image, 14, 0, 60, 60, $darkred, 'Ubuntu-C.ttf', "Self:");
	imagettftext($image, 12, 0, 10, 80, $darkred, 'Ubuntu-C.ttf', $self);
	imagettftext($image, 14, 0, 50, 140, $darkred, 'Ubuntu-C.ttf', "Opponent:");
	imagettftext($image, 12, 0, 10, 160, $darkred, 'Ubuntu-C.ttf', $opponent);
		
	imagepng($image, "action$i.png");
	imagedestroy($image);
	$i++;
}
?>
