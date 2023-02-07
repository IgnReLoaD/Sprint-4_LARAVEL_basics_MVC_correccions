@extends('layouts.plantillabase');

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

    <h2>Vista Index de Players del Team {{$recordsetPlayers[0]->team_id}}:</h2>
    <p></p>
    <a href="players/create" class="btn btn-success mb-6">Crear jugador per aquest club/equip</a>
    <p></p>
    <table id="tblTeams" class="table table-success table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-success text-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">team_id</th>
                <th scope="col">Nom</th>
                <th scope="col">Dorsal</th>
                <th scope="col">Naixement</th>
                <th scope="col">Posicio</th>
                <th scope="col">Lesions</th>
                <th scope="col">Opcions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recordsetPlayers as $fieldsetPlayer)
            <tr>
                <td>{{ $fieldsetPlayer->id }}</td>
                <td>{{ $fieldsetPlayer->team_id }}</td>
                <td>{{ $fieldsetPlayer->name }}</td>
                <td>{{ $fieldsetPlayer->number }}</td>
                <td>{{ $fieldsetPlayer->birthdate }}</td>
                <td>{{ $fieldsetPlayer->position }}</td>
                <td>{{ $fieldsetPlayer->injuries }}</td>                
                <td>  
                {{-- y --}}   
                    <form action="players/{{$fieldsetPlayer->id}}/destroy" method="post">
                        <a href="players/{{$fieldsetPlayer->id}}/edit" class="btn btn-success">editar</a>             
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger">borrar</button>
                    </form>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>    
    {{-- <a href="/clubs/{{$objClub->id}}/teams/$recordsetPlayers[0]->team_id}}/edit" class="btn btn-secondary"><< Tornar a Llista Equips</a> --}}
    <a href="/clubs" class="btn btn-secondary"><< Tornar a Llista de Clubs</a> &nbsp;
    <a href="/clubs/{{$id_club}}/teams" class="btn btn-secondary"><< Tornar a Llista Equips</a> &nbsp;
    <a href="/clubs/{{$id_club}}/teams/{{$recordsetPlayers[0]->team_id}}/edit" class="btn btn-success"><< Tornar a Fitxa Equip</a> &nbsp;

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
