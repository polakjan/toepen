<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

    <script src="js/game.js"></script>

    <style>
#game .loading-message {
    display: none;
}
#game.loading .loading-message {
    display: block;
}
    </style>

</head>
<body>
    
    <nav>
        <a href="<?php echo url::to(''); ?>">Homepage</a>
    </nav>

    <h1>Game detail</h1>

    <div id="messages">
    </div>

    <div id="game">

        <div class="loading-message">LOADING...</div>

    </div>

    <button id="reload">RELOAD</button>

    <script>
$(function() {

    var g = new game(<?php echo $game_id; ?>, '<?php echo url::to('api'); ?>');
    g.init();

    $('#reload').click(function(ev) {
        g.init();
    });

});
    </script>

</body>
</html>