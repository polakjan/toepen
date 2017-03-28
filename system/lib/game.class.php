<?php

class game
{
    public static function getOrCreate($game_id, $new_game_name = null)
    {
        $query = "
            SELECT `games`.*
            FROM `games`
            WHERE `games`.`id` = ?
        ";
        $game = db::find($query, [$game_id]);

        if(!$game)
        {
            $query = "
                INSERT INTO `games`
                (`name`, `started_at`)
                VALUES
                (?, NOW())
            ";
            db::query($query, [$new_game_name]);

            $game_id = db::lastInsertId();

            $query = "
                SELECT `games`.*
                FROM `games`
                WHERE `games`.`id` = ?
            ";
            $game = db::find($query, [$game_id]);
        }

        return $game;

    }

    public function playerPlaysGame($player_id, $game_id)
    {
        $query = "
            SELECT *
            FROM `player_has_game`
            WHERE `player_has_game`.`player_id` = ?
              AND `player_has_game`.`game_id` = ?
        ";
        $connection = db::find($query, [$player_id, $game_id]);

        return (boolean)$connection;
    }

}