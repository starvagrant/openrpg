<?php
require 'login.php';

$dsn = 'mysql:host=localhost;dbname=openrpg';
$pdo = new PDO($dsn, $db_username, $db_password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function print_dump($var){
	echo "<pre>\n"; var_dump($var); echo "</pre>\n";
}

?>

<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="utf-8">
<title>Candidates For Super Pac</title>
<style>

div {
	border: 1px solid red;
}
span {
	border: 1px solid blue;
}
#card {
	position: absolute;
	top: 50px;
	left: 50px;
	height: 600px;
	width: 600px;
}
#candid_name {
	position: absolute;
	top: 00px;
	height: 80px;
	width: 600px;
	z-index: 1;
	text-align: center;
}

#military {
	position: absolute;
	top: 80px;
	height: 80px;
	width: 600px;
	z-index: 1;
	text-align: center;
}
#economic_stability {
	position: absolute;
	top: 160px;
	height: 80px;
	width: 600px;
	z-index: 1;
	text-align: center;
}
#infrastructure {
	position: absolute;
	top: 240px;
	height: 80px;
	width: 600px;
	z-index: 1;
	text-align: center;
} 
#nationalism {
	position: absolute;
	top: 320px;
	height: 80px;
	width: 600px;
	z-index: 1;
	text-align: center;
}
#energy_intensity {
	position: absolute;
	top: 400px;
	height: 80px;
	width: 600px;
	z-index: 1;
	text-align: center;
}
</style>
</head>

<body>
<div id="card">
	<span id="candid_name">Span</span>
	<span id="military">Span</span>
	<span id="economic_stability">Span</span>
	<span id="infrastructure">Span</span>
	<span id="nationalism">Span</span>
	<span id="energy_intensity">Span</span>
</div>
<script>
<?php 
	$json = "var candidateArray = [ \n";
	
	try {
	$sql_select = "SELECT * FROM candidates";
	$result_statement = $pdo->query($sql_select);
	$result_statement->setFetchMode(PDO::FETCH_ASSOC);
	while($row = $result_statement->fetch()){
		$json .= <<<_JSON
		{ "candidate" : "{$row['candid_name']}",
		"stats" : { 
			"military": "{$row['military']}", 
			"economic_stability": "{$row['economic_stability']}", 
			"infrastructure": "{$row['infrastructure']}", 
			"nationalism": "{$row['nationalism']}",  
			"energy_intensity": "{$row['energy_intensity']}" }
		}, 
_JSON;
	} // end while	

	$last_comma = strrpos($json, ",");
	$json = substr($json, 0, $last_comma - 1);
	$json .= "\n\t\t} \n";
	$json .= " ]; \n";


	} catch (PDOException $e){
		$error = $e->getMessage();
	}
	echo $json;
?>

var card = document.getElementById('card');
var candid_name = document.getElementById('candid_name');
var military = document.getElementById('military');
var economic_stability = document.getElementById('economic_stability');
var infrastructure = document.getElementById('infrastructure');
var nationalism = document.getElementById('nationalism');
var energy_intensity = document.getElementById('energy_intensity');

console.log(candid_name);
	
var flipNewCard = function() {
	console.log('clicked');
	var rand = Math.floor(Math.random() * 60);

	candid_name.innerHTML = "name:" + candidateArray[rand].candidate;
	military.innerHTML = "military:" + candidateArray[rand].stats.military;	
	economic_stability.innerHTML = "economic_stability:" + candidateArray[rand].stats.economic_stability;	
	infrastructure.innerHTML = "infrastructure: " + candidateArray[rand].stats.infrastructure;	
	nationalism.innerHTML = "nationalism: " + candidateArray[rand].stats.nationalism;	
	energy_intensity.innerHTML = "energy_intensity:" + candidateArray[rand].stats.military;	
}

document.getElementById('card').addEventListener('click', function(e) {
	flipNewCard(); }, false);

console.log('finished');

</script>
</body>
</html>
