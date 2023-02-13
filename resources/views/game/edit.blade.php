@extends('layouts.plantillabase');
@section('contenido')

<div class="container" style="border: solid 1px green; background-color: #F0FFF0; background-image: url('.resources/assets/cesped.jpg'">  
<p></p>
<h2>Vista Editar un Partit</h2>
<form action="/games/{{$game->id}}" method="post" >    
    @csrf 
    @method('PUT')

    <div class="containter" style="margin-top: 60px; display:flex; flex-direction:row; justify-content:space-around; border: solid 1px green">
        <div class="mb-3  mt-3">
            <label for="inpCod" class="form-label">Codi </label>
            <input type="text" id="inpCod" name="inpCod" style="width:80px" class="form-control" disabled
            value="{{$game->id}}" >
        </div>
        <div class="mb-3  mt-3">
            <label for="inpJor" class="form-label">Jornada </label>
            <input type="text" id="inpJor" name="inpJor" style="width:80px" class="form-control" tabindex="1"
        value="{{$game->journey}}" > 
        </div>    
        <div class="mb-3  mt-3">
            <label for="inpDat" class="form-label">Data </label>
            <input type="date" id="inpDat" name="inpDat" style="width:250px" class="form-control" tabindex="2"
            value="{{$game->datetime}}" >
        </div>    
        <div class="mb-3  mt-3">
            <label for="inpReferee" class="form-label">Col·legiat</label>
            <input type="text" id="inpReferee" name="inpReferee" style="width:550px" class="form-control" tabindex="3"
            disabled placeholder="per futura versio" >            
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
            <select id="cmbHomeTeam" class="form-control" style="width:200px" name="cmbHomeTeam" tabindex="5">
                @foreach($teams as $team)
                    @if ($team->id_club == $club->id)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                    @endif
                @endforeach
            </select>
        </div> 
        <div class="mb-3 mt-3">
            <label for="inpHomeScore" class="form-label">Marcador</label>
            <input type="number" id="inpHomeScore" name="inpHomeScore" class="form-control" style="width:60px" tabindex="6"
            value="{{$game->score_home}}" >
        </div> 
        <div class="mb-3 mt-3">
            <label for="inpAwayScore" class="form-label">&nbsp;</label>
            <input type="number" id="inpAwayScore" name="inpAwayScore" class="form-control" style="width:60px" tabindex="7"
            value="{{$game->score_away}}" >
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
            <select id="cmbAwayTeam" class="form-control" name="cmbAwayTeam" style="width:200px" tabindex="9">
                @foreach($teams as $team)
                    @if ($team->id_club == $club->id)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>          
    </div>
    
    <p></p>

    <a href="/games" class="btn btn-secondary" tabindex="10">Cancelar </a>
    <button type="submit" class="btn btn-success" tabindex="11">Grabar </button>
</form>
<br>
<hr>
    <!-- LLISTA D'ACCIONS D'AQUEST PARTIT  -->
    <div class="container mt-6">        
        <!-- <a href="/games/{{$game->id}}/actions" class="btn btn-success">Veure el minut a minut (accions)... [opció no disponible]</a> -->
        <a href="#" class="btn btn-success">Veure el minut a minut (accions)... [opció no disponible]</a>
        <!-- @csrf   -->
        <!-- @yield('teamsList') -->
    </div>    

    <p></p>

</div>


    <script>
        var cmbChange = document.getElementById("cmbHomeClub");        
        cmbChange.addEventListener("change", function() {
            console.log(cmbChange.value);
            alert(cmbChange.value);
            document.getElementById("cmbHomeTeam").innerHTML = foreach(teams as team){if(team->club_id == cmbChange.value) print("<option value="{{$team->id}}">{{$team->name}}</option>") }
        });

    // cmbClub = document.getElementById('cmbHomeClub');
    // cmbClub.onchange(){
    //     alert('change');
    // }

    // $(function(){
    //     $('#cmbHomeClub').on('change', onSelectClubChange);
    // });

    // function onSelectClubChange(){
    //     var club_id = $(this).val();
    //     alert(club_id);
    // }

    </script>
@endsection
