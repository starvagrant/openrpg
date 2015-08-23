console.info('view script started');

////////////////////////////////////////////// 			Player Hand UI Code
var $playerHandContainer = $('#player-hand-container');
var $playerHandArea = $('#player-hand-area');
var $playerCardList = $('#player-hand-area ul');
var $playerDrawButton = $('button#draw');
var $playerSliderButton = $('button#hand-area-switch');

$playerDrawButton.on('click', function(event) {			// Draw Card
	var $listItem = $('<li/>');		
	$listItem.text('new list item');
	$playerCardList.append($listItem);
	// info sent to controller
	console.log('card drawn');
});	

$playerSliderButton.on('click', function(event) {				// Collapse Hand Area
	$playerHandArea.toggleClass('hidden');
	if ($playerHandArea.hasClass('hidden')){
		$(this).text('+');
		$playerHandContainer.css({"width": "5%"});
		$centerContainer.css({"width": "68%"});
		console.log($centerContainer.css('width'));
	} else {
		$(this).text('hide');
		$playerHandContainer.css({"width": "24%"});
		$centerContainer.css({"width": "48%"});
	}
	console.log('card list hidden');
});

/////////////////////////////////////////////////		Center Container UI Code
var $centerContainer = $('#center-container');
console.log($centerContainer.css('width'));

/////////////////////////////////////////////////		Election Cards UI Code
var $electionContainer = $('#election-container');
var $electionArea = $('#election-area');
var $electionButtons = $('#election-area button');
var $electionAreaSlider = $('button#election-area-switch');

$electionAreaSlider.on('click', function(){
	$electionArea.toggleClass('hidden');
	if ($electionArea.hasClass('hidden')) {
		$(this).text('+');
		$electionContainer.css({"width": "5%"});
		$centerContainer.css({"width": "68%"});
		console.log($centerContainer.css('width'));
	} else {
		$electionContainer.css({"width": "24%"});
		$centerContainer.css({"width": "48%"});
		$(this).text('hide');
	}
	console.log('election cards hidden');
});
