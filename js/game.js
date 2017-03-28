function game(game_id, api_url) {
    
    this.game_id = game_id;
    this.api_url = api_url;

    this.container = $('#game');

};

game.prototype = {

    id: 1,

    init: function() {
        // create a global variable from this object (so that it is accessible in other functions)
        var self = this;
        
        // load the current state of the game from the DB
        this.container.addClass('loading');
        $.get(
            this.api_url,
            {
                action: 'loadGame',
                game_id: this.game_id
            },
            function(response, status) {
                // use the `self` global variable in place of `this`
                self.container.removeClass('loading');
                
                self.displayMessage(response.message);
                console.log(response);
            }
        );

    },

    displayMessage: function(text) {
        var new_message = $('<div class="message"></div>');
        new_message.html(text);

        $('#messages').append(new_message);
    }

}