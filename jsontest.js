/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

 */
console.info('script start');

function isEmpty(obj) {

    if (obj == null) return true;
    if (obj.length > 0)    return false;
    if (obj.length === 0)  return true;
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }
    return true;
}

function fullConsole(checkVar){
    console.group('full console');
    console.info(checkVar);
    console.table(checkVar);
    console.groupEnd();
    
}
function testNotEmpty(checkObj){
    console.assert(isEmpty(checkObj), 'object not empty');
}
    
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

actionCardArray.sort(randomize);
//fullConsole(actionCardArray[0]);

var actionHand = [];
testNotEmpty(actionHand); 

var $draw = $('#draw');
var $show = $('#show');
var $hand = $('#hand');
var $reset = $('#reset');

$draw.on('click', function() { 
    //alert('click'); 
    actionCardArray.sort(randomize);
    actionHand.push(actionCardArray[0]);
});

$show.on('click', function() { 
    //alert('clicked'); 
    //fullConsole(actionHand);
    testNotEmpty(actionHand);
    for (var i = 0; i < actionHand.length; i++){
        //fullConsole(actionHand[i]);
        console.log(actionHand[i].image_src);
        /*
        $hand.hide();
        $hand.attr('src', actionHand[i].image_src);
        $hand.fadeIn(1000);
        */
    }
});

$reset.on('click', function(){
   fullConsole(actionHand);
   actionHand = [];
   testNotEmpty(actionHand);
   fullConsole(actionHand);
    
});