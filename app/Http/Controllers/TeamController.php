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
        $recordsetTeams = Team::select("*")->where('club_id','=',$id_club)->get()->sortByDesc('name');                
        if (count($recordsetTeams) == 0) {
            echo "<p style=color:red>ATENCIO: no hi ha Equips per aquest Club, tornem a Fitxa Club... </p>";
            // sleep(0.5);
            $fieldsetClub = Club::select("*")->where('id','=',$id_club)->get()->sortByDesc('name');
            // echo "cantidad elementos en fieldsetClub = " . count($fieldsetClub) . "<br>";   
            // echo "fieldsetClub[0]->id=".$fieldsetClub[0]->id;         
            return view('club.edit')->with('club',$fieldsetClub[0]);
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
        $objClub = Club::find($id_club);
        // per crear un Team que pertanyi al Club (li passem valor a grabar a Clau Forana)
        return view('team.create')
                    ->with('id_club',$id_club)
                    ->with('objClub',$objClub);
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
        // echo 'TeamController::store -> request inpCodClub: ' . $request->get('inpCodClub') . '<br>';
        // echo 'TeamController::store -> request cmbNomTeam: ' . $request->get('cmbNomTeam');
        // echo 'TeamController::store -> request cmbTypTeam: ' . $request->get('cmbTypTeam');
        // echo "TeamController::store -> id_club=".$id_club."<BR>";
        // die;

        $objTeam = new Team();
        $objTeam->club_id = $request->get('inpCodClub');
        $objTeam->name = $request->get('cmbNomTeam');
        $objTeam->type = $request->get('cmbTypTeam');  
        $objTeam->save();
        
        $objClub = Club::find($request->get('inpCodClub'));
        // $arrTeam = Team::
        // return view('club.edit')->with('club',$objClub);
        // return view('team.index')->with('team',$objTeam);

        $recordsetTeams = Team::select("*")->where('club_id','=',$request->get('inpCodClub'))->get()->sortByDesc('name');
        if (count($recordsetTeams) == 0) {
            echo "<p style=color:red>ATENCIO: no hi ha Equips per aquest Club, tornem a Fitxa Club... </p>";
            $fieldsetClub = Club::select("*")->where('id','=',$request->get('inpCodClub'))->get()->sortByDesc('name');    
            return view('club.edit')->with('club',$fieldsetClub[0]);
        }else{
            return view('team.index')->with('recordsetTeams',$recordsetTeams);
        }        
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
        // $objTeam->club_id = $request->get('inpCodClub');
        $objTeam->club_id = $id_club;
        $objTeam->name = $request->get('cmbNomTeam');
        $objTeam->type = $request->get('cmbTypTeam');
        $objTeam->save();
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
