{{$game}}

@extends('layouts.app')

@section('title','painel')

@section('content')

    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Games</a>
            <a href="{{route('game.novo')}}" class="btn btn-info my-sm-0">Novo Game</a>
        </nav>

        @if(empty($game))
            <div class="alert alert-danger">
                Não ha games cadastrados
            </div>
        @else
            <div class="class-body">
                <div class="card-deck">
                    @foreach($game as $g)
                        <div class="col-sm-4">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>