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

function Focus(){
    this.$ = $('#focus');
    function init(){
        var ul = $('<ul/>');
        var li = $('<li/>');
        li.text('focus area');
        ul.append(li);
        this.$.append(ul);
    }
    this.init = init;
}

PlayerHand = new PlayerHand();
PlayerHand.init();

Focus = new Focus();
Focus.init();

