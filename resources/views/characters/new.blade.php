@extends('layouts.app')

@section('title','Adicionar Personagem')

@section('content')

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                @if(empty($character))
                Novo
                @else
                Editar {{$character->characters_name}}
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


            <form action="{{empty($character)?route('Character.add'):action('CharacterController@update',$character->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12 col-sm-12">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="characters_name" value="{{!empty($character->characters_name)?$character->characters_name:old('characters_name')}}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label>Frase:</label>
                    <input type="text" class="form-control" name="frase_characters" value="{{!empty($character->frase_characters)?$character->frase_characters:old('frase_characters')}}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label>Descrição:</label>
                    <textarea class="form-control" name="characters_description" rows="3">{{!empty($character->characters_description)?$character->characters_description:old('characters_description')}}</textarea>

                </div>

                <div class="col-md-12 col-sm-12">
                    <label>Game:</label>
                    <select name="game" class="form-control" id="character_game">
                        <option value="empty">Selecione o Game</option>
                        @foreach($games as $g)
                        <option id="{{$g->id}}" value="{{$g->id}}">{{$g->game_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-md-12 col-sm-12">
                    <label>Imagem</label>
                    <input type="file" name="image" class="form-control" value="{{!empty($character->image)?$character->image:old('image')}}">
                    @if(!empty($character->image))
                        <img src="{{env('APP_URL')}}/storage/{{$character->image}}" name="image">
                    @endif
                </div>

                <div class="col-md-12 col-sm-12">
                    <label></label>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>


            </form>

        </div>
    </div>
</body>
<script type="text/javascript">
    let j = "{{empty($character)}}";

    if (j != 1) {
        let i = document.getElementById("{{!empty($character->game)?$character->game:''}}");
        i.setAttribute('selected', 'selected');
    }
</script>
@endsection