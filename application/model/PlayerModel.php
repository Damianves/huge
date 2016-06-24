<?php

class PlayerModel
{
	public static function getAllPlayers()
	{
		$database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM players";
        $query = $database->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
	}


	public static function getplayer($player_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT player_id, player_name, player_surname FROM players WHERE player_id = $player_id";
        $query = $database->prepare($sql);
        $query->execute(array(':player_id' => $player_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    public static function createPlayer($player_name, $Player_surname)
    {
        if (!$Player_text || strlen($player_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_PLAYER_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO players (player_name, player_id, player_surname) VALUES (:player_name, :player_id, :player_surname)";
        $query = $database->prepare($sql);
        $query->execute(array(':player_name' => $player_name, ':player_id' => $player_id, ':player_surname' => $player_surname));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    public static function updatePlayer($player_id, $player_name, $player_surname)
    {
        
        if (!$player_id || !$player_name || !$player_surname) {
            return false;
        }
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE players SET player_name = :player_name, player_surname = :player_surname WHERE player_id = :player_id";
        $query = $database->prepare($sql);
        $query->execute(array(
            ':player_id' => $player_id, 
            ':player_name' => $player_name, 
            ':player_surname' => $player_surname
            ));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_PLAYER_EDITING_FAILED'));
        return false;
    }

    public static function deleteplayer($player_id)
    {
        if (!$player_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM player WHERE player_id = :player_id";
        $query = $database->prepare($sql);
        $query->execute(array(':player_id' => $player_id, ':player_name' => $player_name, ':player_surname' => $player_surname));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_PLAYER_DELETION_FAILED'));
        return false;
    }

}