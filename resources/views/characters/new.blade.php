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
                    <input type="text" class="form-control"  name="frase_characters" value="{{!empty($character->frase_characters)?$character->frase_characters:old('frase_characters')}}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label>Descrição:</label>
                    <textarea class="form-control" name="characters_description" rows="3">{{!empty($character->characters_description)?$character->characters_description:old('characters_description')}}</textarea>
                    
                </div>

                <div class="col-md-12 col-sm-12">
                    <label>Game:</label>
                    <input type="text" class="form-control" name="game" value="{{!empty($character->game)?$character->game:old('game')}}">
                </div>


                <div class="col-md-12 col-sm-12">
                    <label >Imagem</label>
                    <input type="file" name="image" class="form-control">
                </div>
                
                <div class="col-md-12 col-sm-12">
                    <label ></label>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                

            </form>

        </div>
    </div>
</body>
@endsection