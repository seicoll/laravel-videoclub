<!-- Capítols -->
@if (count($chapters) > 1)
    <h2>Capítols</h2>
      
      @foreach( $chapters as $key => $chapter )
        <p><b>S{{$chapter->season}} E{{$chapter->episode}}</b> - {{$chapter->title}}</p>
      @endforeach
@endif

<br>
<!-- Nou Capítol -->

<div class="panel panel-info">
  <div class="panel-heading">
    Afegir capítol
  </div>
  <div class="panel-body">
    <form action="{{ url('chapter/create') }}" method="POST" >
        {{ csrf_field() }}
        <input type="hidden" name="movie_id" value="{{ $pelicula->id }}">
        
        <fieldset class="form-group">
          <label for="" >Núm. temporada</label>
          <input type="number" class="form-control input-sm" name="season" placeholder="" id="season" required></input>
        </fieldset>
        <fieldset class="form-group">
          <label for="" >Núm. capítol</label>
          <input type="number" class="form-control input-sm" name="episode" placeholder="" id="episode" required></input>
        </fieldset>
        <fieldset class="form-group">
          <label for="" >Títol</label>
          <input type="text" class="form-control input-sm" name="title" placeholder="Titol del episodi" required></textarea>
        </fieldset>
        <fieldset class="form-group">
          <input type="submit" class="btn btn-success btn-sm btn-b" value="Guardar"/>
          <input type="reset" class="btn btn-default btn-sm btn-b" value="Cancel·lar"/>
        </fieldset>
    </form>
  </div>
</div>

