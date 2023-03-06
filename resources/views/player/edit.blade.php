@extends('layouts.plantillabase');

@section('contenido')

<h2>Vista Editar un Player de un Team</h2>

<!-- FITXA DE DETALL DEL PLAYER  -->
<form action="/clubs/{{$objTeam->club_id}}/teams/{{$objPlayer->team_id}}/players/{{$objPlayer->id}}" method="post">    
    
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 
    <!-- etiqueta Form només té method Post/Get, aquesta directiva de Blade permet dir PUT -->
    @method('PUT')
    <div class="mb-3">
        <label for="inpNomClub" class="form-label">Nom Club</label>
        <input type="text" id="inpNomClub" name="inpNomClub" class="form-control" tabindex="0" disabled
        value="{{$objClub->name}}">
    </div>      
    <div class="mb-3">
        <label for="inpNomTeam" class="form-label">Nom Equip (categoria)</label>        
        <input type="text" id="inpNomTeam" name="inpNomTeam" class="form-control" tabindex="0" disabled
        value="{{$objTeam->name}}">
    </div>      
    <div class="mb-3">
        <!-- <label for="inpCod" class="form-label">Codi jugador</label> -->
        <input type="hidden" id="inpCod" name="inpCod" class="form-control" disabled
        value="{{$objPlayer->id}}">
    </div>
    <div class="mb-3">
        <!-- <label for="inpTea" class="form-label">Equip</label> -->
        <input type="hidden" id="inpTea" name="inpTea" class="form-control" tabindex="1"
        value="{{$objPlayer->team_id}}">
    </div>
    <div class="mb-3">
        <label for="inpNom" class="form-label">Nom</label>
        <input type="text" id="inpNom" name="inpNom" class="form-control" tabindex="2"
        value="{{$objPlayer->name}}">        
    </div>
    <div class="mb-3">
        <label for="inpDor" class="form-label">Dorsal</label>
        <input type="text" id="inpDor" name="inpDor" class="form-control" tabindex="3"
        value="{{$objPlayer->number}}">
    </div>             
    <div class="mb-3">
        <label for="inpBir" class="form-label">Naixament</label>
        <input type="date" id="inpBir" name="inpBir" class="form-control" tabindex="4"
        value="{{$objPlayer->birthdate}}">
    </div>       
    <a href="/clubs/{{$objTeam->club_id}}/teams/{{$objTeam->id}}/players" class="btn btn-secondary" tabindex="5">Cancelar (tornar a llista jugadors)</a>
    <button type="submit" class="btn btn-success" tabindex="6">Grabar (i tornar a llista Jugadors de {{$objTeam->name}} de {{$objClub->name}})</button>
</form>
<br>
<hr>
    <!-- LLISTA DE LESIONS D'AQUEST PLAYER  -->
    <div class="container mt-6">        
        <a href="#" class="btn btn-success">Veure les seves lesions (no operatiu)...</a>         

        <!-- @csrf   -->
        <!-- @yield('teamsList') -->
    </div>
    

@endsection
