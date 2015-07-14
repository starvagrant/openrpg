
/*
What are my data structures? 
	Hands
	Races
	Debates
	Elections
	Stats
*/
//////////// CONSTRUCTORS //////////////////////////

function ActionCard(){			// constructor
	this.purpose = "action";
// 	console.log(this.purpose + " action");
// 	cardtype, name, self_rules, opponent_rules
}
function MoneyCard(){			// constructor
	this.purpose = "money";
//	console.log(this.purpose + " money");
//	cardtype, amount, name, quote
}
function CandidateCard(){			// constructor

	this.purpose = "candidate";
	console.log(this.purpose + " candidate");
//	candidate, stats object (military, economic stability, infrastructure, nationalism, energy_infrastructure)
}

/* Card is a Factory */
function Card (cardType, cardName, cardJson){			// constructor

	this.cardName = cardName;
	this.cardJson = cardJson;
	if (cardType == 'money') this.traits = new MoneyCard();
	if (cardType == 'action') this.traits = new ActionCard();
	if (cardType == 'candidate') this.traits = new CandidateCard();
}

function Hand(type){			// constructor

	this.type = type;
	this.cards = [];

}

///////////////// PROTOTYPES /////////////////////////
Hand.prototype.draw = function(type, name, json){			// prototype
//	console.log(name);
//	console.log(type);
	var newCard = new Card(type, name, json);
	this.cards.push(newCard);
	console.log(this.cards);
};

////////////////// TESTS ////////////////////////
var playerHand = new Hand('player');
var blankobject = {};
playerHand.draw('money', '5', 'json');

var candidateHand = new Hand('candidate');
candidateHand.draw('candidate', 'Squiggles Magoo', 'json');
