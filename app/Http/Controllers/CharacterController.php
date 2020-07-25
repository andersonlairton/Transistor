<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Model\Character;
use App\Model\Game;
use Exception;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function novo()
    {
        return view('characters/new')->withGames($this->listGames());
    }

    public function listGames()
    {
        return Game::all();
    }

    public function addCharacter(CharacterRequest $p)
    {
        try {
            Character::create($p->all());
            return redirect()
                ->action('CharacterController@list')
                ->withSuccess('Personagem cadastrado com sucesso');
        } catch (Exception $erro) {
            return ['erro' => $erro];
        }
    }

    public function update(CharacterRequest $p)
    {
        $character = Character::find($p->id);
        $character->update($p->all());
        return redirect()
            ->action('CharacterController@list')
            ->withSuccess('Personagem editado com sucesso');
    }

    public function list()
    {
        $character = Character::all();
        return view('characters/painel')->withCharacters($character);
    }

    public function edit($id)
    {
        $character = Character::find($id);
        return view('characters/new')
            ->withCharacter($character)
            ->withGames($this->listGames());
    }

    public function delete($id)
    {
        $character = Character::find($id);
        $character->delete($id);

        return redirect()
            ->action('CharacterController@list')
            ->withSuccess('Personagem deletado com sucesso');
    }
    
}
