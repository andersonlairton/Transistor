<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Model\Character;
use Exception;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function novo()
    {
        return view('characters/new');
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

    public function update()
    {

    }

    public function list()
    {
        $character = Character::all();
        return view('characters/painel')->withCharacters($character);
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
    
}
