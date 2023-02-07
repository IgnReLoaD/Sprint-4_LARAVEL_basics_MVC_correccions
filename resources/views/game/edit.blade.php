@extends('layouts.plantillabase');
@section('contenido')

<h2>Vista Editar un Partit</h2>
<form action="/games/{{$game->id}}" method="post" >    
    @csrf 
    @method('PUT')
    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled
        value="{{$game->id}}" >        
    </div>
    <div class="mb-3">
        <label for="inpDat" class="form-label">Data</label>
        <input type="date" id="inpDat" name="inpDat" class="form-control" tabindex="1"
        value="{{$game->datetime}}" >
    </div>    
    <div class="mb-3">
        <label for="inpJor" class="form-label">Jornada</label>
        <input type="text" id="inpJor" name="inpJor" class="form-control" tabindex="2"
        value="{{$game->journey}}" >        
    </div>
    <div class="mb-3">
        <label for="inpHomeTeam" class="form-label">Equip local</label>
        <input type="number" id="inpHomeTeam" name="inpHomeTeam" class="form-control" tabindex="3"
        value="{{$game->home_team_id}}" >        
    </div>        
    <div class="mb-3">
        <label for="inpHomeScore" class="form-label">Marcador local</label>
        <input type="number" id="inpHomeScore" name="inpHomeScore" class="form-control" tabindex="4"
        value="{{$game->score_home}}" >        
    </div>     
    <div class="mb-3">
        <label for="inpAwayTeam" class="form-label">Equip visitant</label>
        <input type="number" id="inpAwayTeam" name="inpAwayTeam" class="form-control" tabindex="5"
        value="{{$game->visitor_team_id}}" >        
    </div>     
    <div class="mb-3">
        <label for="inpAwayScore" class="form-label">Marcador visitant</label>
        <input type="number" id="inpAwayScore" name="inpAwayScore" class="form-control" tabindex="6"
        value="{{$game->score_away}}" >        
    </div>                 
    <div class="mb-3">
        <label for="inpReferee" class="form-label">Col·legiat</label>
        <input type="text" id="inpReferee" name="inpReferee" class="form-control" disabled placeholder="per futura versio" >
    </div>     
    <a href="/games" class="btn btn-secondary" tabindex="7">Cancelar </a>
    <button type="submit" class="btn btn-success" tabindex="8">Grabar </button>
</form>
<br>
<hr>
    <!-- LLISTA D'ACCIONS D'AQUEST PARTIT  -->
    <div class="container mt-6">        
        <a href="/games/{{$game->id}}/actions" class="btn btn-success">Veure el minut a minut... </a>
        <!-- @csrf   -->
        <!-- @yield('teamsList') -->
    </div>    

@endsection
