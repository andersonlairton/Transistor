<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Http\Requests\UpdatGameRequest;
use App\Model\Game;
use Exception;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function list()
    {
        $game = Game::all();
        return view('games/painel')->withGame($game);
    }

    public function searchGame($id)
    {
        $game = Game::find($id);
        return $game;
    }

    public function uploadImagem($image)
    {
        $file = $image->store('games');
        return $file;
    }

    public function gameCharacter(GameRequest $g)
    {
        $data = $g->all();
        $data['background_image'] = $this->uploadImagem($g->file('background_image'));
        
        try {
            Game::create($data);
            return redirect()
                ->action('GameController@list')
                ->withSuccess('Game cadastrado com sucesso');
        } catch (Exception $erro) {
            return ['erro' => $erro];
        }
    }

    public function edit($id)
    {
        return view('games/new')->withGame($this->searchGame($id));
    }

    public function update(UpdatGameRequest $g)
    {
        $game = $this->searchGame($g->id);
        $data = $g->all();
        if(!empty($data['background_image'])){
            $data['background_image'] = $this->uploadImagem($g->file('background_image'));
        }
        $game->update($data);
        return redirect()
            ->action('GameController@list')
            ->withSuccess('Game editado com sucesso');
    }
    public function delete($id)
    {
        $game = $this->searchGame($id);
        $game->delete($id);

        return redirect()
            ->action('GameController@list')
            ->withSuccess('Game deletado com sucesso');
    }
}
