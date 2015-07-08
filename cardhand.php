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
	<li class="card-type">Action Card</li>
	<li class="card-name">Primary</li>
        <li class="self"><span class="title">Self:</span> <p>Rule Explanation</p>
        <li id="opponent"><span class="title">Opponent:</span> <p>Rule Explantion</p>
      </ul>

      <ul>
	<li class="card-type">Action Card</li>
	<li class="card-name">Primary</li>
        <li class="self"><span class="title">Self:</span> <p>Rule Explanation</p>
        <li class="opponent"><span class="title">Opponent:</span> <p>Rule Explantion</p>
      </ul>

	<ul>
	<li class="card-type">Money Card</li>
	<li class="card-name">Big Bank Bailout</li>
        <li class="amount">$50</li> 
        <li class="quote">A big bank gets money, regardless of performance</li> 
      </ul>
	<button id="money"> Draw a Money Card </button>
	<button id="action"> Draw an Action Card </button>
    </div>
<script src="jquery-1.11.0.js"></script>
<script>
	var listItems = $('li');
	var firstListItems = $('li:first-of-type');
	var unOrderedLists = $('ul');
	var button = $('button');
	var request;
	var list;

	listItems.hide();
	firstListItems.show();	

	unOrderedLists.on('mouseover', function() {
		$(this).children().show();
	});
	unOrderedLists.on('mouseout', function() {
		$(this).children().hide();
		firstListItems.show();	
	});

	button.on('click', function(event) {
		var thisButton = $(this);
		var cardType = event.target.id;
		var data = "cards." + cardType + ".json"
		request = $.get(data, function() {
			console.log("success");
		})
		.done(function(data){
			// generate a random card
			var card = Math.floor(Math.random() * data.length);
			console.log(card);
			list = '<ul>\n'
			for (fields in data[card]){
				list += '<li class="' + fields + '">' +	data[card][fields] + '</li>\n';
			}
			list += '</ul>';

			$(list).insertAfter('ul:last');
		})
		.fail(function(){
//			console.log('no data');
		})
		.always(function(){
//			console.log('finished');
		}); // end request
	}); // end on function
</script>
</body>
</html>
