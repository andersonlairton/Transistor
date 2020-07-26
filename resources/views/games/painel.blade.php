@extends('layouts.app')

@section('title','painel')

@section('content')
<div class="container">
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
                        <h5 class="card-title">{{$g->game_name}}</h5>
                        <img src="{{env('APP_URL')}}/storage/{{$g->background_image}}" alt="Imagem do game" class="card-img-top">
                        <p class="card-text">{{$g->game_phrase}}</p>
                        <p class="card-text">{{$g->theme_highlight_text}}</p>
                        <a href="{{action('GameController@edit',$g->id)}}" class="btn btn-secondary">Editar</a>
                        <a href="#" class="btn btn-danger" onclick="js:btnExcluir('{{$g->id}}')">Excluir</a>
                        <p class="card-text"></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <script type="text/javascript">
                function btnExcluir($id){
                    let redirect = "{{action('GameController@delete',['id'=>':id'])}}";
                    redirect = redirect.replace(":id",$id);
                    $direct = confirm("Deseja remover este game?");
                    if($direct == true){
                        location.href = redirect;
                    }
                }
            </script>
        @endif
    </div>
</div>
@endsection