@extends('layouts.plantillabase');

@section('contenido')

<h2>Crear nou Jugador per {{$objTeam->name}} de {{$objClub->name}}:</h2>

{{-- <form action="/clubs/{{$team->club_id}}/teams/{{$team->id}}/players" method="post"> --}}

<form action="/clubs/{club}/teams/{team}/players" method="post">
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 
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
        <!-- <label for="inpCodPlayer" class="form-label">Codi jugador</label> -->
        <!-- evitar tener un codigo editable en el formulario, aunque sea para estudiar -->
        <input type="hidden" id="inpCodPlayer" name="inpCodPlayer" class="form-control" disabled >
    </div>
    <div class="mb-3">
        <!-- <label for="inpCodTeam" class="form-label">Equip</label> -->
        <!-- ojo! si ponemos DISABLED no incorpora el valor inpTea dentro del $_POST[]  -->
        <input type="hidden" id="inpCodTeam" name="inpCodTeam" class="form-control" tabindex="0"        
        value="{{$id_team}}">
        {{-- value="{{$team->id}}"> --}}
    </div>    
    <div class="mb-3">
        <label for="inpNomPlayer" class="form-label">Nom jugador</label>
        <input type="text" id="inpNomPlayer" name="inpNomPlayer" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="inpDorsal" class="form-label">Dorsal</label>
        <input type="number" id="inpDorsal" name="inpDorsal" class="form-control" tabindex="2">
    </div>    
    <div class="mb-3">
        <label for="inpBirthdate" class="form-label">Naixament</label>
        <input type="date" id="inpBirthdate" name="inpBirthdate" class="form-control" tabindex="3">
    </div>    

    {{-- <a href="/clubs/{{$team->club_id}}/teams/{{$team->id}}/players" class="btn btn-secondary" tabindex="3">Cancelar (i tornar a llista Jugadors)</a> --}}
    <a href="/clubs/{{$id_club}}/teams/{{$id_team}}/players" class="btn btn-secondary" tabindex="4">Cancelar (i tornar a llista Jugadors)</a>

    <button type="submit" class="btn btn-success" tabindex="5">Grabar (i tornar a llista Jugadors de {{$objTeam->name}} de {{$objClub->name}})</button>
</form>
@endsection
