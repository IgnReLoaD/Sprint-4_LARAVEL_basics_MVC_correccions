@extends('layouts.plantillabase');

@section('contenido')

<h2>Enregistrar una nova acció per aquest Partit:</h2>

<form action="/games/{game}/actions" method="post">
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 
    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled>
    </div>
    <div class="mb-3">
        <label for="inpPar" class="form-label">Partit</label>
        <!-- ojo! si ponemos DISABLED no incorpora el valor inpClb dentro de $_POST[]  -->
        <input type="text" id="inpPar" name="inpPar" class="form-control" tabindex="0"
        value="{{$id_game}}">
    </div>    
    <div class="mb-3">
        <label for="inpMin" class="form-label">Minut</label>
        <input type="text" id="inpMin" name="inpMin" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="inpEve" class="form-label">Event de joc</label>
        <input type="number" id="inpEve" name="inpEve" class="form-control" tabindex="2">
    </div>    
    <div class="mb-3">
        <label for="inpPla" class="form-label">Jugador</label>
        <input type="number" id="inpPla" name="inpPla" class="form-control" tabindex="2">
    </div>       
    <a href="/games/{{$id_game}}/actions" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Grabar</button>
</form>
@endsection
