@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div>
                        <div class="card">
                            <div class="card-header">Games</div>
                                <div class="card-deck">
                                    <div class="card-body">
                                        <center>
                                            <h1 class="card-title" >{{$totalGame}}</h1>
                                            <p class="card-text">games cadastrados</p>

                                            <div>
                                                <a href="{{route('game.novo')}}" class="btn btn-info my-sm-0">Novo Game</a>
                                                <a href="{{route('game.list')}}" class="btn btn-info my-sm-0">Ver todos Games</a>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                    </div>
                        
                    <div>
                        <div class="card">
                            <div class="card-header">Personagens</div>
                                <div class="card-deck">
                                    <div class="card-body">
                                        <center>
                                            <h1 class="card-title" >{{$totalCharacters}}</h1>
                                            <p class="card-text">personagens cadastrados</p>
                                            <div>
                                                <a href="{{route('character.novo')}}" class="btn btn-info my-sm-0">Novo Personagem</a>
                                                <a href="{{route('character.list')}}" class="btn btn-info my-sm-0">Ver todos Personagens</a>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
