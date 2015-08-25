<?php
    // put your code here
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OO Card Game</title>
	<link rel="stylesheet" type="text/css" href="sp_view/superpac.css" />

</head>
<body>
	<div id="player-hand-container">
		<button id="hand-area-switch">Hide</button>
		<div id="player-hand-area">
			<button id="draw">Draw Card</button>
			<ul>

			</ul>
		</div>
	</div>
	<div id="center-container">
		Place
		<div id="focus"></div>
		<div id="control-panel"></div>
		<div id="candidate-hand"></div>
	</div>
	<div id="election-container">
		<button id="election-area-switch">Hide</button>
		<div id="election-area">
			<button id="president-switch">Presendital Race</button>
			<div id="president-race"></div>
			<button id="senate-switch">Senate Races</button>
			<div id="senate-race"></div>
			<button id="legislate1-switch">House Race 1</button>
			<div id="legislate1-race"></div>
			<button id="legislate2-switch">House Race 2</button>
			<div id="legislate2-race"></div>
			<button id="legislate3-switch">House Race 3</button>
			<div id="legislate3-race"></div>
			<button id="legislate4-switch">House Race 4</button>
			<div id="legislate4-race"></div>
			<button id="legislate5-switch">House Race 5</button>
			<div id="legislate5-race"></div>
		</div>
	</div>
    <div id="experiment"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="sp_model/superpacModel.js"></script>
    <script src="sp_view/superpacView.js"></script>
    <script src="sp_controller/superpacController.js"></script>
</body>
</html>
