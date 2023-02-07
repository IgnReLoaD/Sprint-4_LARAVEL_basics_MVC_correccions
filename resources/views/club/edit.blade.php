@extends('layouts.plantillabase');

@section('contenido')

<h2>Vista Editar un Club</h2>

<!-- FITXA DE DETALL DEL CLUB  -->
<form action="/clubs/{{$club->id}}" method="post">
<!-- <form action="{{ route('club.update', $club) }}" method="post"> -->
    
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 

    <!-- etiqueta Form només té method Post/Get, aquesta directiva de Blade permet dir PUT -->
    @method('PUT')

    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled
        value="{{$club->id}}">
    </div>
    <div class="mb-3">
        <label for="inpNom" class="form-label">Nom</label>
        <input type="text" id="inpNom" name="inpNom" class="form-control" tabindex="1"
        value="{{$club->name}}">
    </div>
    <div class="mb-3">
        <label for="inpFun" class="form-label">Fundat</label>
        <input type="date" id="inpFun" name="inpFun" class="form-control" tabindex="2"
        value="{{$club->foundation_year_month}}">        
    </div>
    <div class="mb-3">
        <label for="inpPal" class="form-label">Palmares</label>
        <input type="number" id="inpPal" name="inpPal" class="form-control" tabindex="3"
        value="{{$club->palmares}}">
    </div>        
    <div class="mb-3">
        <label for="inpAdd" class="form-label">Address</label>
        <input type="text" id="inpAdd" name="inpAdd" class="form-control" tabindex="4"
        value="{{$club->office_address}}">
    </div>        
    <a href="/clubs" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-success" tabindex="6">Grabar</button>
</form>
<br>
<hr>
    <!-- LLISTA DE TEAMS_CATEGORIES D'AQUEST CLUB  -->
    <div class="container mt-6">        
        <a href="/clubs/{{$club->id}}/teams" class="btn btn-success">Veure els seus equips...</a>         

        <!-- @csrf   -->
        <!-- @yield('teamsList') -->
    </div>
    

@endsection
