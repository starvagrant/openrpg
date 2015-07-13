/*
What are my data structures? 
	Hands
	Races
	Debates
	Elections
	Stats
*/
function ActionCard(){
	this.purpose = "action";
}
function MoneyCard(){
	this.purpose = "money";
}
function CandidateCard(){
	this.purpose = "candidate";
}

/* Card is a Factory */
function Card (type, name){
	this.name = name;
	if (type == 'action') this.action = new ActionCard();
	if (type == 'money') this.money = new MoneyCard();
	if (type == 'candidate') this.candidate = new CandidateCard();
}

function Hand(size, name){
	this.size=size;
	this.cards= [];
	for (i = 0; i < size; i++){
		var newCard = new Card('action', 'debate');
		this.cards.push(newCard);
	}
	console.log('card drawn');
}

Hand.prototype.draw = function(size, name){
	var newCard = new Card('money', '5');
	this.cards.push(newCard);
	console.log(this.cards);	
};

var playerHand = new Hand(3, 'action');
playerHand.draw();
var candidateHand = new Hand(3, 'candidate');
candidateHand.draw();
