@extends('layouts.plantillabase');
@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
    <h2>Vista Index de Actions (minut a minut) del Partit {{$recordsetActions[0]->game_id}}:</h2>
    <p></p>
    <a href="actions/create" class="btn btn-success mb-6">Enregistrar nova acció per aquest partit:</a>
    <p></p>
    <table id="tblTeams" class="table table-success table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-success text-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Partit</th>
                <th scope="col">Minut</th>
                <th scope="col">Event de joc</th>
                <th scope="col">Jugador</th>
                <th scope="col">Obs.arbitrals</th>
                <th scope="col">Opcions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recordsetActions as $fieldsetAction)
            <tr>
                <td>{{ $fieldsetAction->id }}</td>
                <td>{{ $fieldsetAction->match_id }}</td>
                <td>{{ $fieldsetAction->minute }}</td>                
                <td>{{ $fieldsetAction->event_id }}</td>
                <td>{{ $fieldsetAction->player_id }}</td>
                <td>{{ $fieldsetAction->referee_observations }}</td>
                <td> editar i borrar, en versió 2.0</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <a href="/games" class="btn btn-secondary"><< Tornar a la llista de Partits</a> &nbsp;
    <a href="/games/{{$fieldsetAction->match_id}}/edit" class="btn btn-success"><< Tornar a la Fitxa del Partit</a>    

    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            // html id de Table li hem dit 'clubs'
            $('#tblTeams').DataTable({
                "lengthMenu": [[5,10,15,-1],[5,10,15,'tots']]
            });
        });
    </script>
    @endsection

@endsection
