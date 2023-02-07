@extends('layouts.plantillabase');

@section('contenido')

<h2>Crear nou club</h2>

<form action="/clubs" method="post">
    
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 

    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled>
    </div>
    <div class="mb-3">
        <label for="inpNom" class="form-label">Nom</label>
        <input type="text" id="inpNom" name="inpNom" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="inpFun" class="form-label">Fundat</label>
        <input type="date" id="inpFun" name="inpFun" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="inpPal" class="form-label">Palmares</label>
        <input type="number" id="inpPal" name="inpPal" class="form-control" tabindex="3">
    </div>        
    <div class="mb-3">
        <label for="inpAdd" class="form-label">Adreça</label>
        <input type="text" id="inpAdd" name="inpAdd" class="form-control" tabindex="4">
    </div>     
    <a href="/clubs" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Grabar</button>
</form>
@endsection