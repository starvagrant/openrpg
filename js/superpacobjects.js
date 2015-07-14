/*
What are my data structures? 
	Hands
	Races
	Debates
	Elections
	Stats
*/
//////////// CONSTRUCTORS //////////////////////////

function ActionCard(cardJson){			// constructor

	this.cardJson = cardJson;
	this.cardHTML = "<ul>\n"
		for(field in cardJson){
			this.cardHTML += '<li class="' + field + '>' + cardJson[field] + '</li>\n';
		}
	this.cardHTML += "</ul>\n";
	console.log(this.cardHTML);

// json fields:
// cardtype, name, self_rules, opponent_rules
}
function MoneyCard(cardJson){			// constructor

	this.cardJson = cardJson;
	this.cardHTML = "<ul>\n"
		for(field in cardJson){
			this.cardHTML += '<li class="' + field + '>' + cardJson[field] + '</li>\n';
		}
	this.cardHTML += "</ul>\n";
	console.log(this.cardHTML);

// json fields: 
// cardtype, amount, name, quote
}
function CandidateCard(cardJson){			// constructor

	this.cardJson = cardJson;
	this.cardHTML = "<ul>\n";
	this.cardHTML += '<li class="cardtype">' + cardJson.cardtype + '</li>\n';
	this.cardHTML += '<li class="name">' + cardJson.name + '</li>\n';
	for (field in cardJson.stats){
		this.cardHTML += '<li class="' + field + '>' + cardJson.stats[field] + '</li>\n';
	}
	this.cardHTML += '</ul>';
	console.log(this.cardHTML);

// json fields: 
// card type, candidate, stats object (military, economic stability, infrastructure, nationalism, energy_intensity)
}

/* Card is a Factory */
function Card (cardJson){			// constructor
//	console.log(cardJson);

	this.cardName = cardJson.name
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

Hand.prototype.draw = function(json){			// prototype

	var newCard = new Card(json);
	this.cards.push(newCard);
	console.log(this.cards);
};

////////////////// TESTS ////////////////////////
var playerHand = new Hand('player');

var cardsInArray = playerCardArray.length;
var randomCardNumber = Math.floor(Math.random() * cardsInArray);
var testCard = playerCardArray[randomCardNumber];

console.log(testCard);
playerHand.draw(testCard);

/*
var candidateHand = new Hand('candidate');
var cardsInArray = candidateCardArray.length;
var randomCardNumber = Math.floor(Math.random() * cardsInArray);

// testCard is a json object
var testCard = candidateCardArray[randomCardNumber];
candidateHand.draw(testCard);
*/
