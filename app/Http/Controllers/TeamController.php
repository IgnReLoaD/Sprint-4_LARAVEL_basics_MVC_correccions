<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_club)
    {        
        // DEBUG:
        // echo "TeamController ... id_club = " . $id_club . "<br><br>";
        // die;

        $fieldsetClub = Club::select("*")->where('id','=',$id_club);
        $recordsetTeams = Team::select("*")->where('club_id','=',$id_club)->get()->sortByDesc('name');        
        // print($recordsetTeams);
        
        if (count($recordsetTeams) == 0) {
            echo "no hi ha registres";
            return view('club.edit')->with('club',$fieldsetClub);
        }else{
            return view('team.index')->with('recordsetTeams',$recordsetTeams);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_club)
    {
        // per crear un Team que pertanyi al Club (li passem valor a grabar a Clau Forana)
        return view('team.create')->with('id_club',$id_club);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'request' conté el $_POST[input1,input2,input3...] 
        // print($request->get('inpClb'));
        // print($request->get('inpNom'));
        // print($request->get('inpTyp'));
        // die;
        $objTeam = new Team();
        $objTeam->club_id = $request->get('inpClb');
        $objTeam->name = $request->get('inpNom');
        $objTeam->type = $request->get('inpTyp');  
        $objTeam->save();
        $objClub = Club::find($request->get('inpClb'));
        return view('club.edit')->with('club',$objClub);
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
    public function edit($id_club, $id_team)
    {
        // echo "TeamController... id_club=".$id_club."<br>";
        // echo "TeamController... id_team=".$id_team;
        $objClub = Club::find($id_club);
        $objTeam = Team::find($id_team);
        return view('team.edit', compact('objClub', 'objTeam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_club, $id_team)
    {
        // echo "TeamController - update() - id_club=".$id_club." id_team=".$id_team."<br>";
        // die;
        $objTeam = Team::find($id_team);
        $objTeam->club_id = $request->get('inpClb');
        $objTeam->name = $request->get('inpNom');
        $objTeam->type = $request->get('inpTyp');
        $objTeam->save();
        // die;
        // $recordsetTeams = Team::where('club_id','=',$objTeam->club_id);
        // var_dump($recordsetTeams);
        // echo count($recordsetTeams);
        // die;
        // Club - veure els seus equips ... /clubs/{{$club->id}}/teams
        // return view('team.index')->with($recordsetTeams);

        return redirect('/clubs/'.$objTeam->club_id.'/teams');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_club, $id_team)
    {
        echo "TeamController - destroy - id_club=".$id_club." id_team=".$id_team."<br>";
        // die;

        // metode DELETE espera un objecte perquè ell ja va a eliminar pel seu 'id'
        $objTeam = Team::find($id_team);
        $objTeam->delete();
        return redirect('/clubs/'.$id_club.'/teams');        
    }
}
