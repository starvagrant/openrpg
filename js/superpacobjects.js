/*
What are my data structures? 
	Hands
	Races
	Debates
	Elections
	Stats
*/
//////////// Functions //////////////////////////

function cardFromArray(type){
	switch(type){
		case "player": 
			var cardsInArray = playerCardArray.length;
			var randomCardNumber = Math.floor(Math.random() * cardsInArray);
//			grab random card and remove it from array
			var randCardField = playerCardArray.splice(randomCardNumber, 1);			
			var randCard = randCardField[0];
//			console.log(randCard);
			return randCard;
		break;
		default:
			return { "cardtype" : "empty" };
		break;
	}
}

//////////// CONSTRUCTORS //////////////////////////

function ActionCard(cardJson){			// constructor

	this.cardJson = cardJson;
	this.cardHTML = "<ul>\n"
		for(field in cardJson){
			this.cardHTML += '<li class="' + field + '">' + cardJson[field] + '</li>\n';
		}
	this.cardHTML += "</ul>\n";

// json fields:
// cardtype, name, self_rules, opponent_rules
}
function MoneyCard(cardJson){			// constructor

	this.cardJson = cardJson;
	this.cardHTML = "<ul>\n"
		for(field in cardJson){
			this.cardHTML += '<li class="' + field + '">' + cardJson[field] + '</li>\n';
		}
	this.cardHTML += "</ul>\n";

// json fields: 
// cardtype, amount, name, quote
}
function CandidateCard(cardJson){			// constructor

	this.cardJson = cardJson;
	this.cardHTML = "<ul>\n";
	this.cardHTML += '<li class="cardtype">' + cardJson.cardtype + '</li>\n';
	this.cardHTML += '<li class="name">' + cardJson.name + '</li>\n';
	for (field in cardJson.stats){
		this.cardHTML += '<li class="' + field + '">' + cardJson.stats[field] + '</li>\n';
	}
	this.cardHTML += '</ul>';
//	console.log(this.cardHTML);

// json fields: 
// card type, candidate, stats object (military, economic stability, infrastructure, nationalism, energy_intensity)
}

/* Card is a Factory */
function Card (cardJson){			// constructor
//	console.log(cardJson);

	this.cardName = cardJson.name;
	if (cardJson.cardtype == 'money') this.traits = new MoneyCard(cardJson);
	if (cardJson.cardtype == 'action') this.traits = new ActionCard(cardJson);
	if (cardJson.cardtype == 'candidate') this.traits = new CandidateCard(cardJson);
}

function Hand(type){			// constructor

	this.type = type;
	this.cards = [];

}

///////////////// PROTOTYPES /////////////////////////

/* Hand.prototype.draw will be called by a button 'onclick' event */
/* The function needs to push the value into the hands internal cards array
 * and return the value to the corresponding "draw" event in the UI
 */

Hand.prototype.draw = function(){			// prototype

	var randCard = cardFromArray(this.type);
	var newCard = new Card(randCard);
	this.cards.push(newCard);
	return newCard;							
//	console.log(this.cards);
};

////////////////// TESTS ////////////////////////
var playerHand = new Hand('player');
var candidateHand = new Hand('candidate');
