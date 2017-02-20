@extends('layouts.master')

@section('content')

    {{-- Comentat
    @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
    --}}
    
    <div class="row">

        <div class="col-sm-3">
    
            <img src="{{$pelicula->poster}}" class="img-responsive" alt="{{$pelicula->title}}">
    
        </div>
        
        <div class="col-sm-9">
    
            <h1>{{$pelicula->title}}</h1>
            <h4><b>Any</b>: {{$pelicula->year}}</h4>
            <h4><b>Director</b>: {{$pelicula->director}}</h4>
            <p><b>Resum:</b> {{$pelicula->synopsis}}</p>
            
            
            <form action="{{action('CatalogController@postFavourite', $pelicula->id)}}"  method="POST" style="display:inline">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">
                    @if ($favourite==false)
                        <i class="fa fa-heart" aria-hidden="true"></i> Afegir a favorits
                    @else
                        <i class="fa fa-heart-o" aria-hidden="true"></i> Treure de favorits
                    @endif
                </button>
            </form>
            
            @if ($pelicula->rented )
                <p><b>Estat:</b> Pel·lícula actualment llogada.</p>
                <form action="{{action('CatalogController@putReturn', $pelicula->id)}}"  method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info">
                        Retornar pel·lícula
                    </button>
                </form>
            @else
                <form action="{{action('CatalogController@putRent', $pelicula->id)}}"  method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Llogar pel·lícula
                    </button>
                </form>
            @endif
            
            <a class="btn btn-warning" href="/catalog/edit/{{$id}}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar pel·lícula 
            </a>
            
            <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}"  method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar pel·lícula 
                </button>
            </form>
            
            <a class="btn btn-default" href="/catalog">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Tornar al llistat
            </a>
            
            
            @include('catalog.showchapters')
    
        </div>
    </div>

@stop