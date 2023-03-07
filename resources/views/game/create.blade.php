@extends('layouts.plantillabase');
@section('contenido')

<div class="container" style="border: solid 1px green; background-color: #F0FFF0; background-image: url('.resources/assets/cesped.jpg'">  
<p></p>
<h2>Afegir un Partit al calendari:</h2>
<form action="/games" method="post"> 
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 

    <div class="containter" style="margin-top: 60px; display:flex; flex-direction:row; justify-content:space-around; border: solid 1px green">         
        {{--    
        <div class="mb-3  mt-3">
            <label for="inpCod" class="form-label">Codi </label>
            <input type="text" id="inpCod" name="inpCod" style="width:80px" class="form-control" disabled>
        </div> 
        --}}
        <div class="mb-3  mt-3">
            <label for="inpJor" class="form-label">Jornada (per defecte 1ª)</label>
            <input type="text" id="inpJor" name="inpJor" style="width:80px" class="form-control" tabindex="1"
            placeholder="1">
        </div>    
        <div class="mb-3  mt-3">            
            <label for="inpDat" class="form-label">Data (per defecte {{date('d/m/Y')}} )</label>            
            <input type="date" required id="inpDat" name="inpDat" style="width:250px" class="form-control" tabindex="2" 
            value="{{date('d/m/Y')}}" placeholder="{{date('d/m/Y')}}">            
        </div>    
        <div class="mb-3  mt-3">
            <label for="inpReferee" class="form-label">Col·legiat</label>
            <input type="text" id="inpReferee" name="inpReferee" style="width:550px" class="form-control" tabindex="3">
        </div>  
    </div>
    
    <div class="container" style="margin-top: 60px; display:flex; flex-direction:row; justify-content:space-between; border: solid 1px green">
        <div class="mb-3 mt-3 form-group">                
            <label for="cmbHomeClub" class="form-label">Club local</label>
            <select id="cmbHomeClub" class="form-control" style="width:200px" name="cmbHomeClub" tabindex="4">
                @foreach($clubs as $club)
                    <option value="{{$club->id}}">{{$club->name}}</option>
                @endforeach
            </select>
        </div> 
        <div class="mb-3 mt-3 form-group">                
            <label for="cmbHomeTeam" class="form-label">Equip local</label>
            <select id="cmbHomeTeam" class="form-control" style="width:200px" name="cmbHomeTeam" tabindex="5"
            disabled>
                <option value="per futura versio">--per futura versio--</option>
                {{--            
                @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
                --}}
            </select>
        </div> 
        <div class="mb-3 mt-3">
            <label for="inpHomeScore" class="form-label">&nbsp; Marcador</label>
            <input type="number" id="inpHomeScore" name="inpHomeScore" class="form-control" style="width:60px" tabindex="6"
                min="0" max="20">
        </div> 
        <div class="mb-3 mt-3">
            <label for="inpAwayScore" class="form-label">&nbsp;</label>
            <input type="number" id="inpAwayScore" name="inpAwayScore" class="form-control" style="width:60px" tabindex="7"
                min="0" max="20">            
        </div> 
        <div class="mb-3 mt-3 form-group">                
            <label for="cmbAwayClub" class="form-label">Club visitant</label>
            <select id="cmbAwayClub" class="form-control" name="cmbAwayClub" style="width:200px" tabindex="8">
                @foreach($clubs as $club)
                    <option value="{{$club->id}}">{{$club->name}}</option>
                @endforeach
            </select>
        </div>  
        <div class="mb-3 mt-3 form-group">                
            <label for="cmbAwayTeam" class="form-label">Equip visitant</label>
            <select id="cmbAwayTeam" class="form-control" name="cmbAwayTeam" style="width:200px" tabindex="9"
            disabled>
                <option value="per futura versio">--per futura versio--</option>
                {{--
                @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
                --}}
            </select>
        </div>          
    </div>

    {{--
    <div class="mb-3">
        <label for="inpHomeTeam" class="form-label">Equip local</label>
        <input type="number" id="inpHomeTeam" name="inpHomeTeam" class="form-control" tabindex="10">
    </div>    
    <div class="mb-3">
        <label for="inpAwayTeam" class="form-label">Equip visitant</label>
        <input type="number" id="inpAwayTeam" name="inpAwayTeam" class="form-control" tabindex="11">
    </div>     
    --}}            

    @error('cmbHomeClub')
        <br>
        {{-- <small class="text-red">{{ $message }}</small> --}}
        <small style="color:red">ATENCIO: has seleccionat els mateixos dos clubs.</small>
    @enderror
    @error('inpDat')
        <br>
        <small style="color:red">ATENCIO: verifica la data del partit.</small>
    @enderror     

    <p></p>

    <a href="/games" class="btn btn-secondary" tabindex="10"> Cancelar (i tornar a llista partits) </a>
    <button type="submit" class="btn btn-success" tabindex="11"> Grabar (i tornar a llista partits) </button>

    <p></p>
</form>

</div>

@endsection
