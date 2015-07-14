var button = $('button');		// Initialize Variables

function makeMenus(){ 			// UI function 
								// makes every non-first list item disappear

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
	

// should call Hand.prototype.draw from superpacobjects.js
var clickDraw = function(Hand) {	// UI function, Hand is the Hand Object
								// Add Card to Hand div

	var	newlyDrawnCard = Hand.draw();
	var realReturn = newlyDrawnCard.traits.cardHTML;
	
	$(realReturn).appendTo('#page');
	makeMenus();

} // end function

	// initialize hand
	clickDraw(playerHand); clickDraw(playerHand);	

	// allow further drawing of cards
	button.on('click', function(){
		// console.log(cardType);
		clickDraw(playerHand); 
	}); // end on function

