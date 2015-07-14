<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="utf-8">
<title>Super Pac</title>
<link rel="stylesheet" type="text/css" href="css/cardhand.css" />
</head>

<body>
	<div id="candidate-page">
		<ul>
			<li class="cardtype">Candidate</li>
			<li><ul>
				<li>Stats</li>
				<li>Stats</li>
				<li>Stats</li>
				<li>Stats</li>
			</li></ul>
		</ul>
	</div>
	</div>
	<div id="page">
		<h2>Super Pac</h2>
		<ul id="first">
			<li class="cardtype">Action Card</li>
			<li class="name">Primary</li>
			<li class="self"><span class="title">Self:</span> <p>Rule Explanation</p>
			<li class="opponent"><span class="title">Opponent:</span> <p>Rule Explantion</p>
		</ul>

		<ul>
			<li class="cardtype">Action Card</li>
			<li class="name">Primary</li>
			<li class="self"><span class="title">Self:</span> <p>Rule Explanation</p>
			<li class="opponent"><span class="title">Opponent:</span> <p>Rule Explantion</p>
		</ul>

		<ul>
			<li class="cardtype">Money Card</li>
			<li class="name">Big Bank Bailout</li>
			<li class="amount">$50</li> 
			<li class="quote">A big bank gets money, regardless of performance</li> 
		</ul>
		<button id="money"> Draw a Money Card </button>
		<button id="action"> Draw an Action Card </button>
	</div>
<script src="jquery-1.11.0.js"></script>
<script src="json/cards.json"></script>
<script src="js/superpacui.js"></script>
<script src="js/superpacobjects.js"></script>
</body>
</html>
