<?php

namespace App\Http\Controllers;

use App\Model\Character;
use App\Model\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalGame = Game::all();
        $totalGame = count($totalGame);
        $totalCharacters = count(Character::all());
        
        return view('home')
            ->withTotalGame($totalGame)
            ->withTotalCharacters($totalCharacters);

    }
}
