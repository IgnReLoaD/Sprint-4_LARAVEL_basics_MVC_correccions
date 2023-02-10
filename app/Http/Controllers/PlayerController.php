<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Team;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_club, $id_team)
    {
        echo "id_club: " . $id_club;
        // die;

        $fieldsetClub = Club::select("*")->where('id','=',$id_club)->get()->sortByDesc('name');
        $recordsetPlayers = Player::select("*")->where('team_id','=',$id_team)->get()->sortByDesc('name');
        if (count($recordsetPlayers) == 0) {
            echo "<p style=color:red>ATENCIO: no hi ha jugadors, tornem a Fitxa Equip...</p>";            
            $fieldsetTeam = Team::select("*")->where('id','=',$id_team)->get()->sortByDesc('name');
            // $fieldsetClub = Club::select("*")->where('id','=',$id_club)->get()->sortByDesc('name');
            return view('team.edit')
                ->with('objTeam',$fieldsetTeam[0])
                ->with('objClub',$fieldsetClub[0]);
        }else{
            return view('player.index')                
                ->with('recordsetPlayers',$recordsetPlayers)
                ->with('id_club',$id_club)
                ->with('objClub',$fieldsetClub[0]);
                // , compact('recordsetPlayers', 'id_club'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_club, $id_team)
    {
        // echo "PlayerController ... create!!  .. id_club=".$id_club." id_team=" . $id_team;
        // die;
        $fieldsetClub = Club::select("*")->where('id','=',$id_club)->get()->sortByDesc('name');        
        $fieldsetTeam = Team::select("*")->where('id','=',$id_team)->get()->sortByDesc('name');
        // per crear un Player que pertanyi al Team (li passem valor a grabar a Clau Forana)
        return view('player.create')
                ->with('id_club',$id_club)
                ->with('id_team',$id_team)
                ->with('objTeam',$fieldsetTeam[0])
                ->with('objClub',$fieldsetClub[0]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objPlayer = new Player();
        $objPlayer->team_id = $request->get('inpCodTeam');
        $objPlayer->name = $request->get('inpNomPlayer');
        $objPlayer->number = $request->get('inpDorsal');   
        $objPlayer->birthdate = $request->get('inpBirthdate');
        $objPlayer->save();
        // preparar la view 
        $objTeam = Team::find($request->get('inpCodTeam'));
        $recordsetPlayers = Player::select("*")->where('team_id','=',$objPlayer->team_id)->get()->sortByDesc('name');
        return view('player.index')
                ->with('recordsetPlayers',$recordsetPlayers)
                ->with('id_club',$objTeam->club_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_club, $id_team, $id_player)
    {        
        // $fieldsetClub = Club::select("*")->where('id','=',$id_club)->get()->sortByDesc('name');        
        // $fieldsetTeam = Team::find($id_team);
        // $fieldsetPlayer = Player::find($id_player);
        // // return view('player.edit', compact('objClub','objTeam','objPlayer'));
        // return view('player.edit')
        //         ->with('objClub',$fieldsetClub[0])
        //         ->with('objTeam',$fieldsetTeam[0])
        //         ->with('objPlayer',$fieldsetPlayer[0]);
        $objClub = Club::find($id_club);
        $objTeam = Team::find($id_team);
        $objPlayer = Player::find($id_player);
        return view('player.edit', compact('objClub', 'objTeam', 'objPlayer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_club, $id_team, $id_player)
    {
        echo "PlayerController - update - id_club=".$id_club." id_team=".$id_team." id_player=".$id_player."<br>";
        // die;

        $objPlayer = Player::find($id_player);
        $objPlayer->team_id = $request->get('inpTea');
        $objPlayer->name = $request->get('inpNom');
        $objPlayer->number = $request->get('inpDor');   
        $objPlayer->birthdate = $request->get('inpBir');
        $objPlayer->save();

        // preparar la view 

        // $objTeam = Team::find($request->get('inpTea'));
        $recordsetPlayers = Player::select("*")->where('team_id','=',$objPlayer->team_id)->get()->sortByDesc('name');
        return view('player.index')
                ->with('recordsetPlayers',$recordsetPlayers)
                ->with('id_club',$id_club); 
                // ->with('id_club',$objTeam->club_id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_club, $id_team, $id_player)
    {
        echo "PlayerController - destroy - id_club=".$id_club." id_team=".$id_team." id_player=".$id_player."<br>";
        // die;

        // metode DELETE espera un objecte perquè ell ja va a eliminar pel seu 'id'
        $objPlayer = Player::find($id_player);
        $objPlayer->delete();
        return redirect('/clubs/'.$id_club.'/teams/'.$id_team.'/players'); 
    }
}
