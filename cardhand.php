<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="css/cardhand.css" />
</head>

<body>
    <div id="page">
      <h2>Super Pac</h2>
      <ul id="first">
	<li>Action Card</li>
	<li class="card-name">Primary</li>
        <li class="self"><span class="title">Self:</span> <p>Rule Explanation</p>
        <li id="opponent"><span class="title">Opponent:</span> <p>Rule Explantion</p>
      </ul>

      <ul>
	<li>Action Card</li>
	<li class="card-name">Primary</li>
        <li class="self"><span class="title">Self:</span> <p>Rule Explanation</p>
        <li class="opponent"><span class="title">Opponent:</span> <p>Rule Explantion</p>
      </ul>

	<ul>
	<li>Money Card</li>
	<li class="card-name">Big Bank Bailout</li>
        <li class="ethics">Dirty Money</li> 
        <li class="amount">$50</li> 
        <li class="quote">A big bank gets money, regardless of performance</li> 
      </ul>
    </div>
<script src="jquery-1.11.0.js"></script>
<script>
	var listItems = $('li');
	var firstListItems = $('li:first-of-type');
	var unOrderedLists = $('ul');

	listItems.hide();
	firstListItems.show();	

	unOrderedLists.on('mouseover', function() {
		$(this).children().show();
	});
	unOrderedLists.on('mouseout', function() {
		$(this).children().hide();
		firstListItems.show();	
	});
</script>
</body>
</html>
