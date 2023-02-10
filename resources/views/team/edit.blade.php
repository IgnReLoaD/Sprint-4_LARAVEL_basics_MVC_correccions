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
        <label for="inpCodTeam" class="form-label">Codi equip</label>
        <input type="text" id="inpCodTeam" name="inpCodTeam" class="form-control" disabled
        value="{{$objTeam->id}}">
    </div>
    <div class="mb-3">
        <label for="inpCodClub" class="form-label">Codi Club</label>
        <input type="text" id="inpCodClub" name="inpCodClub" class="form-control" tabindex="0" 
        value="{{$objTeam->club_id}}">
    </div>
    <div class="mb-3">
        <label for="inpNomClub" class="form-label">Nom Club</label>
        <input type="text" id="inpNomClub" name="inpNomClub" class="form-control" tabindex="0" disabled
        value="{{$objClub->name}}">
    </div>    
    <div class="mb-3 form-group">                
        <label for="cmbNomTeam" class="form-label">Nom equip (seva categoria)</label>
        <select id="cmbNomTeam" class="form-control" name="cmbNomTeam" tabindex="1">
            <option value="FirstTeam" <?php if($objTeam->name=="FirstTeam") echo " selected='true'" ?> >FirstTeam</option>
            <option value="SecondTeam" <?php if($objTeam->name=="SecondTeam") echo " selected='true'" ?> >SecondTeam</option>
            <option value="Juvenil"   <?php if($objTeam->name=="Juvenil") echo " selected='true' " ?> >Juvenil</option>
            <option value="Alevi"     <?php if($objTeam->name=="Alevi") echo " selected='true'   " ?> >Aleví</option>
            <option value="Cadet"     <?php if($objTeam->name=="Cadet") echo " selected='true'   " ?> >Cadet</option>
            <option value="Infantil"  <?php if($objTeam->name=="Infantil") echo " selected='true'" ?> >Infantil</option>
            <option value="Amateur"   <?php if($objTeam->name=="Amateur") echo " selected='true' " ?> >Amateur</option>
            <option value="Legends"   <?php if($objTeam->name=="Legends") echo " selected='true' " ?>  >Legends</option>
        </select>
    </div>    

    <div class="mb-3 form-group">                
        <label for="cmbTypTeam" class="form-label">Tipus esport</label>
        <select id="cmbTypTeam" class="form-control" name="cmbTypTeam" tabindex="2">
            <option value="soccer"     <?php if($objTeam->type=="soccer") echo " selected='true'    " ?>  >Soccer</option>
            <option value="basketball" <?php if($objTeam->type=="basketball") echo " selected='true'" ?>  >Basketball</option>
            <option value="handball"   <?php if($objTeam->type=="handball") echo " selected='true'  " ?>  >Handball</option>
        </select>
    </div>  
    
    {{--
    <div class="mb-3">
        <label for="inpTyp" class="form-label">Esport</label>
        <input type="text" id="inpTyp" name="inpTyp" class="form-control" tabindex="3"
        value="{{$objTeam->type}}">
    </div>             
    --}}
    <a href="/clubs/{{$objTeam->club_id}}/teams" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-success" tabindex="5">Grabar</button>
</form>
<br>
<hr>
    <!-- LLISTA DE PLAYERS D'AQUEST TEAM  -->
    <div class="container mt-6">       
        <a href="/clubs/{{$objTeam->club_id}}/teams/{{$objTeam->id}}/players/create" class="btn btn-success">Nou jugador per aquest Equip</a>  
        <a href="/clubs/{{$objTeam->club_id}}/teams/{{$objTeam->id}}/players" class="btn btn-success">Veure els seus jugadors...</a>         
        <!-- @csrf   -->
        <!-- @yield('teamsList') -->
    </div>    

@endsection
