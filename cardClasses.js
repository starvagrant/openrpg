/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Constructors */
function PlayerHand() {
    this._$ = $('#playerHand');
    function draw() {
        alert('card drawn');
        // $(this) is the button that called the function
        var button = $('<button/>');
        button.text('player card');
        button.on('click', draw);
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
        this._$.append(ul);
    }
    
    
    this.init = init;
}

PlayerHand = new PlayerHand();
PlayerHand.init();

