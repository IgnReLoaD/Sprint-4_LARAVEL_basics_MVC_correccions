@extends('layouts.plantillabase');

@section('contenido')

<h2>Crear nou equip per aquest Club:</h2>

<form action="/clubs/{club}/teams" method="post">
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 
    <div class="mb-3">
        <label for="inpCodTeam" class="form-label">Codi equip</label>
        <input type="text" id="inpCodTeam" name="inpCodTeam" class="form-control" disabled>
    </div>
    <div class="mb-3">
        <!-- <label for="inpCodClub" class="form-label">Codi Club</label> -->

        <!-- ojo! a type=HIDDEN pq DISABLED no incorpora el valor inpCodClub dentro de $_POST[]  -->
        
        <input type="hidden" id="inpCodClub" name="inpCodClub" class="form-control" tabindex="0" 
        value="{{$id_club}}">
    </div>    
    <div class="mb-3">
        <label for="inpNomClub" class="form-label">Nom Club</label>
        <!-- ojo! si ponemos DISABLED no incorpora el valor inpClb dentro de $_POST[]  -->
        <input type="text" id="inpNomClub" name="inpNomClub" class="form-control" tabindex="0" 
        value="{{$objClub->name}}" disabled>
    </div>    
  
    {{--
    <div class="mb-3">
        <label for="inpNom" class="form-label">Nom categoria</label>
        <input type="text" id="inpNom" name="inpNom" class="form-control" tabindex="1">
        <p>(serà un combo desplegable, de moment valors valids: FirstTeam, SecondTeam, Juvenil, Aleví, Cadet, Infantil, Amateur, o Legends)</p>
    </div> 
    --}}
    <div class="mb-3 form-group">                
        <label for="cmbNomTeam" class="form-label">Nom equip (seva categoria)</label>
        <select id="cmbNomTeam" class="form-control" name="cmbNomTeam" tabindex="1">
            <option value="FirstTeam">FirstTeam</option>
            <option value="SecondTeam">SecondTeam</option>
            <option value="Juvenil">Juvenil</option>
            <option value="Alevi">Aleví</option>
            <option value="Cadet">Cadet</option>
            <option value="Infantil">Infantil</option>
            <option value="Amateur">Amateur</option>
            <option value="Legends">Legends</option>
        </select>
    </div>    
    {{--
    <div class="mb-3">
        <label for="inpTyp" class="form-label">Tipus esport</label>
        <input type="text" id="inpTyp" name="inpTyp" class="form-control" tabindex="2">
        <p>(serà un combo desplegable, de moment valors valids: soccer, basketball, o handball)</p>
    </div>    
    --}}
    <div class="mb-3 form-group">                
        <label for="cmbTypTeam" class="form-label">Tipus esport</label>
        <select id="cmbTypTeam" class="form-control" name="cmbTypTeam" tabindex="2">
            <option value="soccer">Soccer</option>
            <option value="basketball">Basketball</option>
            <option value="handball">Handball</option>
        </select>
    </div>  

    <a href="/clubs/{{$id_club}}/teams" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-success" tabindex="4">Grabar</button>
</form>
@endsection
