<?php

class api
{
    public $player_id = null;

    public function __construct()
    {
        // TODO: load player id from auth

        $this->player_id = 1; // mock
    }

    // will decide which api call this is
    public function dispatch()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : null;

        $method = 'api'.ucfirst(strtolower($action));

        if(method_exists($this, $method))
        {
            // call the method
            $this->$method();
        }
        else
        {
            return $this->error404($method);
        }

    }

    /**
     * return a running game or create it 
     */
    public function apiLoadgame()
    {
        $game_id = isset($_GET['game_id']) ? $_GET['game_id'] : null;

        $game = game::getOrCreate($game_id, 'New game name');

        // if this user is not permitted to play this game
        if(!game::playerPlaysGame($this->player_id, $game_id))
        {
            return $this->outputError('You are a spectator only.');
        }

        return $this->outputJson($game);
    }

    public function error404($method)
    {
        return $this->outputError('404: Page '.$method.' not found');
    }

    public function outputError($error_message)
    {
        $response = [
            'status' => 'error',
            'message' => $error_message
        ];
        $this->outputJson($response);
    }

    /**
     * outputs any array of data as a JSON string
     */
    protected function outputJson(array $response)
    {
        header('Content-Type: application/json');

        echo json_encode($response);
        exit();
    }
}


$api = new api();
$api->dispatch();