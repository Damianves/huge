<?php 

class PlayerController extends Controller
{

	public function index()
	{
		$this->View->render('player/index', array(
			'players' => PlayerModel::getAllPlayers()
		));
	}

	public function create()
    {
        PlayerModel::createPlayer(Request::post('Player_name'), Request::post('Player_surname'));
        Redirect::to('player');
    }

    public function edit($player_id)
    { 
        $this->View->render('player/edit', array(
            'player' => PlayerModel::getplayer($player_id)
        ));
    }

    public function editSave()
    { 

        PlayerModel::updatePlayer(Request::post('player_id'), Request::post('Player_name'),Request::post('Player_surname'));
        Redirect::to('player');
        
    }

    public function delete($player_id)
    {
        PlayerModel::deleteplayer($player_id);
        Redirect::to('player');
    }



}