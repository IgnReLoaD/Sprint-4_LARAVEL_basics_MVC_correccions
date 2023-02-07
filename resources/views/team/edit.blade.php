@extends('layouts.plantillabase');

@section('inpHiddenClub')
    {{-- <input id="inpHiddenClub" type="hidden" value="{{$objTeam->club_id}}"> --}}
@endsection

@section('contenido')

<h2>Vista Editar un Team de un Club</h2>

<!-- FITXA DE DETALL DEL TEAM  -->
<form action="/clubs/{{$objTeam->club_id}}/teams/{{$objTeam->id}}" method="post">    
    
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 

    <!-- etiqueta Form només té method Post/Get, aquesta directiva de Blade permet dir PUT -->
    @method('PUT')

    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled
        value="{{$objTeam->id}}">
    </div>
    <div class="mb-3">
        <label for="inpClb" class="form-label">Club</label>
        <input type="text" id="inpClb" name="inpClb" class="form-control" tabindex="1"
        value="{{$objTeam->club_id}}">
    </div>
    <div class="mb-3">
        <label for="inpNom" class="form-label">Nom</label>
        <input type="text" id="inpNom" name="inpNom" class="form-control" tabindex="2"
        value="{{$objTeam->name}}">        
    </div>
    <div class="mb-3">
        <label for="inpTyp" class="form-label">Esport</label>
        <input type="text" id="inpTyp" name="inpTyp" class="form-control" tabindex="3"
        value="{{$objTeam->type}}">
    </div>             
    <a href="/clubs/{{$objTeam->club_id}}/teams" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-success" tabindex="5">Grabar</button>
</form>
<br>
<hr>
    <!-- LLISTA DE PLAYERS D'AQUEST TEAM  -->
    <div class="container mt-6">        
        <a href="/clubs/{{$objTeam->club_id}}/teams/{{$objTeam->id}}/players" class="btn btn-success">Veure els seus jugadors...</a>         
        <!-- @csrf   -->
        <!-- @yield('teamsList') -->
    </div>    

@endsection
