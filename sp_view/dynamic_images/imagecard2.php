<?php
$moneyCard[] = array(1,"Peanuts","clean", "it's better than nothing");
$moneyCard[] = array(5,"Small Donor","clean","enough to keep you going");
$moneyCard[] = array(10,"Large Donor","clean","well financed");
$moneyCard[] = array(20,"Deep Pockets","clean","fortune favors the fortunate like you");
$moneyCard[] = array(50,"Iranian Oil Money","dirty","You've secured a large oil sale for Iran whether that's legal or not.");
$moneyCard[] = array(35,"Pharmaceutical Patent","dirty","Doctor a few studies here and there and your miracle drug is poised for profit");
$moneyCard[] = array(30,"Weapons to Mexico","dirty","The Drug war pays both you and the drug lords");
$moneyCard[] = array(35,"Chinese Slave Labor","dirty","People need their cheap disposable goods. You like it when they buy those goods.");
$moneyCard[] = array(25,"Afghanistan Opium","dirty","The resistance gets their  from opium. We demand they supply you profit");
$moneyCard[] = array(40,"Columbian Drug Lords","dirty","Andrew Jackson does not do cocaine. Benjamin Franklin does cocaine.");
$moneyCard[] = array(45,"Tar Sands Pipeline","dirty","The world's biggest oil fields aren't going to tap themselves.");
$moneyCard[] = array(30,"African Blood Diamonds","dirty","When two tribes are at war your best course is to get ahold of their valuables");
$moneyCard[] = array(60,"Nuclear Secrets","dirty","Security is Nothing. Money is Everything.");
$moneyCard[] = array(50,"Big Bank Bailout","dirty","A big bank gets  regardless of performance");
$moneyCard[] = array(40,"Financial Cyberattack","dirty","The hackers of the future are funded by big ");
$moneyCard[] = array(50,"Arms Contract Fraud","dirty","A side deal here a side deal there.");
$moneyCard[] = array(25,"Mid-East Weapons Sale","dirty","Arming the rebels. Which rebels? The rebels that pay.");
$moneyCard[] = array(40,"Rare Earth Minerals","dirty","Technology needs its materials no matter what is costs to extract them.");
$moneyCard[] = array(30,"Clandestine Chemical Plant","dirty","Those pesky US regulations. The supplier moves elsewhere.");

putenv("GDFONTPATH=" . realpath('.'));
print(getenv('GDFORNTPATH'));
echo "\n";
$i = 0;

foreach($moneyCard as $cards => $cardValuesArray){
//$card = $moneyCard[0];
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
	imagettftext($image, 14, 0, 10, 30, $white, 'Ubuntu-C.ttf', $cardValuesArray[1]);
	imagettftext($image, 18, 0, 10, 90, $darkred, 'Ubuntu-C.ttf', "Value:");
	imagettftext($image, 18, 0, 150, 90, $darkred, 'Ubuntu-C.ttf', $cardValuesArray[0]);
	imagettftext($image, 18, 0, 10, 175, $darkred, 'Ubuntu-C.ttf', "Legality:");
	imagettftext($image, 18, 0, 150, 175, $darkred, 'Ubuntu-C.ttf', $cardValuesArray[2]);
		
	imagepng($image, "money$i.png");
	imagedestroy($image);
	$i++;
}
?>
