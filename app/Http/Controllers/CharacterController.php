<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
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
                ->route('game.novo')
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
        
        $file = $this->imageUpload($p->file('image'));


        try {
            $personagem = new Character();
            $personagem->characters_name = $p->characters_name;
            $personagem->frase_characters = $p->frase_characters;
            $personagem->characters_description = $p->characters_description;
            $personagem->game = $p->game;
            $personagem->image = $file;
            $personagem->save();

            return redirect()
                ->action('CharacterController@list')
                ->withSuccess('Personagem cadastrado com sucesso');
        } catch (Exception $erro) {
            return ['erro' => $erro];
        }
    }
    public function imageUpload($image)
    {
        $file = $image->store('characters');   
        return $file;
    }
    
    public function gameCharacter($id)
    {
        $character = Character::where('game',$id)->get();
        return view('characters/painel')->withCharacters($character);
    }

    public function update(UpdateCharacterRequest $p)
    {
        $data = $p->all();
        $character = Character::find($p->id);
        
        if(!empty($data['image'])){
            $data['image'] = $this->imageUpload($p->image);
        }

        $character->update($data);
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
