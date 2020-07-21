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
                <a class="navbar-brand">Personagens</a>
                <a href="{{route('character.novo')}}" class="btn btn-info my-sm-0">Cadastar personagem</a>
            </nav>

           @if(empty($characters))
            <div class="alert alert-danger">
                Não ha personagens cadastrados
            </div>
           @else
            <div class="class-body">
                <div class="card-deck">
                    
                    @foreach($characters as $p)
                
                        <div class="col-sm-4">
                            <div class="card-body">
                                <h5 class="card-title">{{$p->characters_name}}</h5>
                                <p class="card-text">{{$p->frase_characters}}</p>
                                <p class="card-text">{{$p->characters_description}}</p>
                                <a href="#" class="btn btn-secondary">Editar</a>
                                <a href="#" class="btn btn-danger">Excluir</a>
                            </div>
                        </div>
                    @endforeach
        
                </div>
            </div>
           
           @endif
       </div>
   </div>
@endsection