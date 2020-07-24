<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
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

    public function novo()
    {
        return view('games/new');
    }

    public function searchGame($id)
    {
        $game = Game::find($id);
        return $game;
    }

    public function gameCharacter(GameRequest $g)
    {
        try {
            Game::create($g->all());
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

    public function update(GameRequest $g)
    {
        $game = $this->searchGame($g->id);
        $game->update($g->all());
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
