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

}