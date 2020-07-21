@extends('layouts.app')

@section('title','Adicionar Personagem')

@section('content')

<body>
    <div class="container">
        <div class="card-body">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{route('Character.add')}}" method="POST">
                @csrf

                <div class="col-md-12 col-sm-12">
                    <label>Nome:</label>
                    <input type="text" class="form-control" id="characters_name" name="characters_name" value="{{!empty($post->characters_name)?$post->characters_name:old('characters_name')}}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label>Frase:</label>
                    <input type="text" class="form-control" id="frase_characters" name="frase_characters" value="{{!empty($post->frase_characters)?$post->frase_characters:old('frase_characters')}}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label>Descrição:</label>
                    <textarea type="text" class="form-control" id="characters_description" name="characters_description" value="{{!empty($post->characters_description)?$post->characters_description:old('characters_description')}}"></textarea>
                </div>

                <div class="col-md-12 col-sm-12">
                    <button class="btn btn-success" id='btn_cadastrar'>Cadastrar Personagem</button>
                </div>

            </form>

        </div>
    </div>
</body>
@endsection