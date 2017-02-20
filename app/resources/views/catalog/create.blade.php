@extends('layouts.master')

@section('content')

    <h3>Nova pel·lícula</h3>
    
    <form action="/catalog/create" method="POST">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="title">Títol</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Títol">
        </div>
        <div class="form-group">
            <label for="year">Any</label>
            <input type="text" class="form-control" id="year" name="year" placeholder="Any">
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" class="form-control" id="director" name="director" placeholder="Director">
        </div>
        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="text" class="form-control" id="poster" name="poster" placeholder="Poster">
        </div>
        <div class="form-group">
            <label for="synopsis">Resum</label>
            <textarea class="form-control" rows="3" id="synopsis" name="synopsis" placeholder="Synopsis"></textarea>
        </div>
        
        <button type="submit" class="btn btn-info">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Afegir pel·lícula
        </button>
    </form>
    
    

@stop