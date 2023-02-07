<!-- la plantillabase inclou bootstrapp i head i body  -->
@extends('layouts.plantillabase')

<!-- de la web de Datatables.net/examples/styling, 2 links, el bootstrap ya está en plantillabase, falta el otro:  -->
@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

<!-- dins la plantillabase: document.getElementById('contenido') -->
@section('contenido')
    <h2>Vista Index de CLUB</h2>
    <a href="clubs/create" class="btn btn-success mb-6">Crear nou club</a>

    <table id="clubs" class="table table-success table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-success text-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Palmares</th>
                <th scope="col">Fundat</th>
                <th scope="col">Opcions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recordsetClubs as $fieldsetClub)
            <tr>
                <td>{{ $fieldsetClub->id }}</td>
                <td>{{ $fieldsetClub->name }}</td>
                <td>{{ $fieldsetClub->palmares }}</td>
                <td>{{ $fieldsetClub->foundation_year_month }}</td>
                <td>
                    <form action="{{ route ('clubs.destroy',$fieldsetClub->id) }}" method="post">
                        <a href="/clubs/{{$fieldsetClub->id}}/edit" class="btn btn-success">editar</a>
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger">borrar</button>
                    </form>
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        // html id de Table li hem dit 'clubs'
        $('#clubs').DataTable({
            "lengthMenu": [[5,10,15,-1],[5,10,15,'tots']]
        });
    });
</script>
@endsection

@endsection