<?php

require 'login.php';

$dsn = 'mysql:host=localhost;dbname=openrpg';
$pdo = new PDO($dsn, $db_username, $db_password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// initialize variables

$statement = $pdo->query('SELECT * FROM candidates;');

while($row = $statement->fetch()){

	$true_image = imagecreatetruecolor(200, 240);
	$true_white = imagecolorallocate($true_image, 255, 255, 255);
	$true_darkred = imagecolorallocate($true_image, 64, 0, 0);
	$true_alpha_black = imagecolorallocatealpha($true_image, 0, 0, 0, 85);

	$true_black_style = imagecolorallocate($true_image, 0, 0, 0);
	$true_red_style = imagecolorallocate($true_image, 255, 128, 128);
	$true_orange_style = imagecolorallocate($true_image, 224, 160, 96);
	$true_blue_style = imagecolorallocate($true_image, 96, 208, 224);
	$true_green_style = imagecolorallocate($true_image, 176, 255, 144);
	$true_purple_style = imagecolorallocate($true_image, 176, 144, 255);

	imagefilledrectangle($true_image, 0, 0, 200, 40, $true_black_style);
	imagefilledrectangle($true_image, 0, 40, 200, 80, $true_red_style);
	imagefilledrectangle($true_image, 0, 80, 200, 120, $true_orange_style);
	imagefilledrectangle($true_image, 0, 120, 200, 160, $true_green_style);
	imagefilledrectangle($true_image, 0, 160, 200, 200, $true_blue_style);
	imagefilledrectangle($true_image, 0, 200, 200, 240, $true_purple_style);

	putenv("GDFONTPATH=" . realpath('.'));
	// candidate name
	imagettftext($true_image, 30, 45, 55, 180, $true_alpha_black, 'Ubuntu-C.ttf', 'SuperPac');

	// candidate stat
	imagettftext($true_image, 20, 0, 10, 30, $true_white, 'Ubuntu-C.ttf', "{$row['candid_name']}");
	imagettftext($true_image, 20, 0, 160, 70, $true_darkred, 'Ubuntu-C.ttf', "{$row['military']}");
	imagettftext($true_image, 20, 0, 160, 110, $true_darkred, 'Ubuntu-C.ttf', "{$row['economic_stability']}");
	imagettftext($true_image, 20, 0, 160, 150, $true_darkred, 'Ubuntu-C.ttf', "{$row['infrastructure']}");
	imagettftext($true_image, 20, 0, 160, 190, $true_darkred, 'Ubuntu-C.ttf', "{$row['nationalism']}");
	imagettftext($true_image, 20, 0, 160, 230, $true_darkred, 'Ubuntu-C.ttf', "{$row['energy_intensity']}");
	
	// candidate stats labels
	imagettftext($true_image, 20, 0, 10, 70, $true_darkred, 'Ubuntu-C.ttf', 'Military');
	imagettftext($true_image, 20, 0, 10, 110, $true_darkred, 'Ubuntu-C.ttf', 'Stability');
	imagettftext($true_image, 20, 0, 10, 150, $true_darkred, 'Ubuntu-C.ttf', 'Infrastructure');
	imagettftext($true_image, 20, 0, 10, 190, $true_darkred, 'Ubuntu-C.ttf', 'Nationalism');
	imagettftext($true_image, 20, 0, 10, 230, $true_darkred, 'Ubuntu-C.ttf', 'Energy');

	imagepng($true_image, "{$row['candid_id']}.png");
	imagedestroy($true_image);
}
?>
