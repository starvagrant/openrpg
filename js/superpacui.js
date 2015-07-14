var button = $('button');

function makeMenus(){ 	// makes every non-first list item disappear

	var listItems = $('#page li').not('.cardtype');
	var firstListItems = $('#page li.cardtype');
	var unOrderedLists = $('#page ul');
	listItems.hide();
	firstListItems.show();
	unOrderedLists.on('mouseover', function() {
		$(this).children().show();
	});
	unOrderedLists.on('mouseout', function() {
		$(this).children().not('.cardtype').hide();
		firstListItems.show();	
	});
}
	
	makeMenus();
	
	button.on('click', function(event) {
		var thisButton = $(this);
		var cardType = event.target.id;
		var list = '<ul>\n';
		
		// get a card from the right array
		switch(cardType){
			case "money":
				var cardsInArray = moneyCardArray.length;
				var randomCardNumber = Math.floor(Math.random() * cardsInArray);
				var card = moneyCardArray[randomCardNumber];
			break;
			case "action":
				var cardsInArray = actionCardArray.length;
				var randomCardNumber = Math.floor(Math.random() * cardsInArray);
				var card = actionCardArray[randomCardNumber];
			break;
			default:
			break;
		
		} // end switch	
			for (fields in card)
				{
					list += '<li class="' + fields + '">' +	card[fields] + '</li>\n';
				}
			list += '</ul>';
			$(list).insertAfter('#page ul:last');
			makeMenus();
	}); // end on function
