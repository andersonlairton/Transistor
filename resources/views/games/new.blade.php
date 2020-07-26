@extends('layouts.app')

@section('title','Adicionar Game')

@section('content')

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                @if(empty($game))
                    Novo
                @else
                    Editar
                @endif
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{empty($game)?route('game.add'):action('GameController@update',$game->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 col-sm-12">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="game_name" value="{{!empty($game->game_name)?$game->game_name:old('game_name')}}">
                </div>
                
                <div class="col-md-12 col-sm-12">
                    <label>Frase do Game</label>
                    <input type="text" class="form-control" name="game_phrase" value="{{!empty($game->game_phrase)?$game->game_phrase:old('game_phrase')}}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label>Texto destaque</label>
                    <input type="text" class="form-control" name="theme_highlight_text" value="{{!empty($game->theme_highlight_text)?$game->theme_highlight_text:old('theme_highlight_text')}}">
                </div>
                
                <div class="col-md-12 col-sm-12">
                    <label>Imagem do game</label>
                    @if(!empty($game->background_image))
                    <img src="{{env('APP_URL')}}/storage/{{$game->background_image}}" name="background_image">
                    @endif
                    <input type="file" class="form-control" name="background_image">
                </div>

                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                
            </form>

        </div>
    </div>
</body>
@endsection