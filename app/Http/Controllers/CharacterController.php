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
        $g = $this->listGames();

        if ($g->isEmpty()) {
            return redirect()
                ->action('GameController@novo')
                ->withErrors('Não ha games cadastrados,inicialmente cadastre o game para cadastrar o personagem');
        } else {
            return view('characters/new')->withGames($g);
        }
    }

    public function listGames()
    {
        return Game::all();
    }

    public function addCharacter(CharacterRequest $p)
    {
        $p->file('image')->store('characters'); //definindo diretorio onde a imagem é salva

        $file = $p->allFiles()['image'];
        $p->image = $file->store('characters');

        try {
            $personagem = new Character();
            $personagem->characters_name = $p->characters_name;
            $personagem->frase_characters = $p->frase_characters;
            $personagem->characters_description = $p->characters_description;
            $personagem->game = $p->game;
            $personagem->image = $file->store('characters');
            $personagem->save();

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
