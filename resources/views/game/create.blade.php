@extends('layouts.plantillabase');
@section('contenido')

<h2>Afegir un Partit al calendari:</h2>
<form action="/games" method="post"> 
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 
    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi </label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled>
    </div>
    <div class="mb-3">
        <label for="inpDat" class="form-label">Data </label>
        <input type="date" id="inpDat" name="inpDat" class="form-control" tabindex="1">
    </div>    
    <div class="mb-3">
        <label for="inpJor" class="form-label">Jornada </label>
        <input type="text" id="inpJor" name="inpJor" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="inpHomeTeam" class="form-label">Equip local</label>
        <input type="number" id="inpHomeTeam" name="inpHomeTeam" class="form-control" tabindex="3">
    </div>        
    <div class="mb-3">
        <label for="inpHomeScore" class="form-label">Marcador local</label>
        <input type="number" id="inpHomeScore" name="inpHomeScore" class="form-control" tabindex="4">
    </div>     
    <div class="mb-3">
        <label for="inpAwayTeam" class="form-label">Equip visitant</label>
        <input type="number" id="inpAwayTeam" name="inpAwayTeam" class="form-control" tabindex="5">
    </div>     
    <div class="mb-3">
        <label for="inpAwayScore" class="form-label">Marcador visitant</label>
        <input type="number" id="inpAwayScore" name="inpAwayScore" class="form-control" tabindex="6">
    </div>                 
    <div class="mb-3">
        <label for="inpReferee" class="form-label">Col·legiat</label>
        <input type="text" id="inpReferee" name="inpReferee" class="form-control" tabindex="7">
    </div>     
    <a href="/games" class="btn btn-secondary" tabindex="8"> Cancelar </a>
    <button type="submit" class="btn btn-success" tabindex="9"> Grabar </button>
</form>
@endsection
