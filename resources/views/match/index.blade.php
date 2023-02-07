<!-- la plantillabase inclou bootstrapp i head i body  -->
@extends('layouts.plantillabase')

<!-- de la web de Datatables.net/examples/styling, 2 links, el bootstrap ya está en plantillabase, falta el otro:  -->
@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

<!-- dins la plantillabase: document.getElementById('contenido') -->
@section('contenido')
    <h2>Vista Index de MATCHES (partits)</h2>
    <a href="matches/create" class="btn btn-success mb-6">Crear nou partit</a>

    <table id="htmlTable" class="table table-success table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-success text-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Horari</th>
                <th scope="col">Jornada</th>
                <th scope="col">Local</th>
                <th scope="col" colspan="2">>Marcador</th>
                <!-- <th scope="col">Marcador visitant</th> -->
                <th scope="col">Visitant</th>
                <th scope="col">Opcions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recordsetMatch as $fieldsetMatch)
            <tr>
                <td>{{ $fieldsetMatch->id }}</td>
                <td>{{ $fieldsetMatch->datetime }}</td>
                <td>{{ $fieldsetMatch->journey }}</td>
                <td>{{ $fieldsetMatch->home_team_id }}</td>
                <td>{{ $fieldsetMatch->score_home }}</td>
                <td>{{ $fieldsetMatch->score_away }}</td>
                <td>{{ $fieldsetMatch->visitor_team_id }}</td>
                <td>
                    <form action="{{ route ('matches.destroy',$fieldsetMatch->id) }}" method="post">
                        <a href="/matches/{{$fieldsetMatch->id}}/edit" class="btn btn-success">editar</a>
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
        // html id de Table li hem dit 'htmlTable'
        $('#htmlTable').DataTable({
            "lengthMenu": [[5,10,15,-1],[5,10,15,'tots']]
        });
    });
</script>
@endsection

@endsection