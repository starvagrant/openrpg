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

	this.purpose = "action";
	this.cardHTML = "<ul>\n"
		for(field in cardJson){
			this.cardHTML += '<li class="' + field + '>' + cardJson[field] + '</li>\n';
		}
	this.cardHTML += "</ul>\n";
	console.log(this.cardHTML);

	// 	cardtype, name, self_rules, opponent_rules
}
function MoneyCard(cardJson){			// constructor

	this.purpose = "money";
	this.cardHTML = "<ul>\n"
		for(field in cardJson){
			this.cardHTML += '<li class="' + field + '>' + cardJson[field] + '</li>\n';
		}
	this.cardHTML += "</ul>\n";
	console.log(this.cardHTML);

//	cardtype, amount, name, quote
}
function CandidateCard(cardJson){			// constructor

	this.purpose = "candidate";

	this.cardHTML = "<ul>\n";
	this.cardHTML += '<li class="cardtype">candidate</li>\n';
	this.cardHTML += '<li class="candidate">' + cardJson.candidate + '</li>';
	for (field in cardJson.stats){
		this.cardHTML += '<li class="' + field + '>' + cardJson.stats[field] + '</li>\n';
	}
	this.cardHTML += '</ul>';
	console.log(this.cardHTML);

//	candidate, stats object (military, economic stability, infrastructure, nationalism, energy_infrastructure)
}

/* Card is a Factory */
function Card (cardType, cardName, cardJson){			// constructor

	this.cardName = cardName;
	this.cardJson = cardJson;
	if (cardType == 'money') this.traits = new MoneyCard(cardJson);
	if (cardType == 'action') this.traits = new ActionCard(cardJson);
	if (cardType == 'candidate') this.traits = new CandidateCard(cardJson);
}

function Hand(type){			// constructor

	this.type = type;
	this.cards = [];

}

///////////////// PROTOTYPES /////////////////////////

/* Hand.prototype.draw will be called by a button 'onclick' event */

Hand.prototype.draw = function(type, name, json){			// prototype
//	console.log(name);
//	console.log(type);
	var newCard = new Card(type, name, json);
	this.cards.push(newCard);
//	console.log(this.cards);
};

////////////////// TESTS ////////////////////////
var playerHand = new Hand('player');
var blankobject = {};
/*
var moneyTest = {"cardtype": "money", "amount": 10, "name": "large donor", "quote": "well financed"};
playerHand.draw('money', '5', moneyTest);
var actionTest = {"cardtype": "action", "name": "Primary", "self_rules" : "self", "opponent_rules" : "opponent"};
playerHand.draw('action', 'Primary', actionTest);
*/
var candidateHand = new Hand('candidate');
var candidateTest = { 
	"candidate" : "Lindsey Grime",
	"stats" : {
		"military": "-3",
		"economic_stability": "1",
		"infrastructure": "3",
		"nationalism": "-1",
		"energy_intensity": "4" }
		}
candidateHand.draw('candidate', 'Squiggles Magoo', candidateTest);
console.log('yoyoyo? finsihed');
