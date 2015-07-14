
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
		var data = "json/cards." + cardType + ".json"
		var request = $.get(data, function() {
			console.log("success");
		})
		.done(function(data){
			// generate a random card
			var card = Math.floor(Math.random() * data.length);
			var list = '<ul>\n'
			for (fields in data[card]){
				list += '<li class="' + fields + '">' +	data[card][fields] + '</li>\n';
			}
			list += '</ul>';

			$(list).insertAfter('#page ul:last');
			makeMenus();
		})
		.fail(function(){
//			console.log('no data');
		})
		.always(function(){
//			console.log('finished');
		}); // end request
	}); // end on function
