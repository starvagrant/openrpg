/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Array data / methods */
var actionCardArray = [
{"cardtype": "action", "name": "Primary", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action0.png"},
{"cardtype": "action", "name":"Election", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action1.png"},
{"cardtype": "action", "name":"Scandal", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action2.png"},
{"cardtype": "action", "name":"Debate", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action3.png"},
{"cardtype": "action", "name":"Audit", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action4.png"},
{"cardtype": "action", "name":"Super Pac", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action5.png"},
{"cardtype": "action", "name":"Fundraiser", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action6.png"},
{"cardtype": "action", "name":"Backdoor Deal", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action7.png"},
{"cardtype": "action", "name":"Rally", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action8.png"},
{"cardtype": "action", "name":"Media Blitz", "self_rules" : "self", "opponent_rules" : "opponent", "image_src": "dynamic_images/action9.png"}
];

function randomize(a, b) {
    if (Math.random() > Math.random()) return -1;
    return 1;
}

function getRandomCard(cardArray){
    cardArray.sort(randomize);
    return cardArray[0]; 
}


//fullConsole(actionCardArray[0]);

/* Constructors */
//////////////////////////////////////////////////////////////// Player's Hand
function PlayerHand() {
    this.$ = $('#playerHand');
    function draw() {
        // $(this) is the button that called the function
        var card = getRandomCard(actionCardArray);
        var button = $('<button/>');
        button.text(card.name);
        var li = $('<li/>');
        li.append(button);
        $(this).parent().parent().append(li);
        console.info('button made');
    }
    function init() {
//       this._$.text('initialized');
        var ul = $('<ul/>');
        var li = $('<li/>');
        var button = $('<button/>');
        button.text('player card');
        button.on('click', draw);
        li.append(button);
        ul.append(li);
        this.$.append(ul);
    }
    
    this.init = init;
}

////////////////////////////////////////////////////////// Area of Main Focus
function Focus(){
    this.$ = $('#focus');
    function init(){
        this.$.text('Focus Area ');
        var card = $('<img/>');
        card.addClass('played-card');
        card.attr('alt', ' card here ');
//        card.attr('src', "dynamic_images/action5.png");
        this.$.append(card);
        var button = $('<button/>');
        button.text('play card');
        button.on('click', function(){
            var playingCard = getRandomCard(actionCardArray);
            displayCard(playingCard);
        });
        this.$.append(button);
    }
    
    // display a played card in the game's focus area
    function displayCard(cardJson){
        var cardDisplayed = $('img.played-card');
        cardDisplayed.attr('src', cardJson.image_src);
        console.info('card displayed');
    }
    // holds the game's current logic in an object until it's processed
    this.gameEvent = {};
    this.init = init;
    this.displayCard = displayCard;
}
/////////////////////////////////////////////////////////////////////// Player's Control Panel
function ControlPanel(){
    this.$ = $('#control-panel');
    function init(){
        button = $('<button/>');
        button.text('Take Turn');
        this.$.append(button);
    }
    this.init = init;
}

////////////////////////////////////////////////////////////////////// Experimental Area
function Experiment(){
    this.$ = $('#experiment');
    image = $('<img/>');
//    image.src = "dynamic_images/action5.png";
    image.attr('src', "dynamic_images/action5.png");
    
    this.$.append(image);
}

PlayerHand = new PlayerHand();
PlayerHand.init();

Focus = new Focus();
Focus.init();

ControlPanel = new ControlPanel();
ControlPanel.init();


//var playingCard = getRandomCard(actionCardArray);
//Focus.displayCard(playingCard);

//Experiment = new Experiment();

// Personal Note: how do I grab jQuery objects based on their type?
// How do I write tests?