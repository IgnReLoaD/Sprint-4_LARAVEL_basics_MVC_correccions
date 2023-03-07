<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Club;
use App\Models\Team;
use App\Models\Game;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordsetGames = Game::all();
        $recordsetClubs = Club::all();
        $recordsetTeams = Team::all();
        return view('game.index')
                ->with('recordsetGames', $recordsetGames)
                ->with('recordsetClubs', $recordsetClubs)
                ->with('recordsetTeams', $recordsetTeams);                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recordsetClubs = Club::all();
        // seria interesante filtrar por campo categoria (Alevin, Juvenil...)
        $recordsetTeams = Team::all();
        return view('game.create')
                    ->with('clubs',$recordsetClubs)
                    ->with('teams',$recordsetTeams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "GameController::store...request->get('inpDat') vale: " . $request->get('inpDat') . "<br>";  
        // echo "GameController::store...request->get('inpJor') vale: " . $request->get('inpJor') . "<br>";  
        // echo "GameController::store...request->get('cmbHomeTeam') vale: " . $request->get('cmbHomeTeam') . "<br>";  
        // echo "GameController::store...request->get('cmbHomeClub') vale: " . $request->get('cmbHomeClub') . "<br>";  
        // echo "GameController::store...request->get('inpHomeScore') vale: " . $request->get('inpHomeScore') . "<br>";  
        // echo "GameController::store...request->get('inpAwayScore') vale: " . $request->get('inpAwayScore') . "<br>";
        // echo "GameController::store...request->get('cmbAwayClub') vale: " . $request->get('cmbAwayClub') . "<br>";        
        // echo "GameController::store...request->get('cmbAwayTeam') vale: " . $request->get('cmbAwayTeam') . "<br>";  
        // die;

        $request->validate([
            'cmbHomeClub' => ['required','different:cmbAwayClub'],
            'cmbAwayClub' => ['required','different:cmbHomeClub'],
            'inpDat' => 'required'
        ]);

        $datAppoint = $request->get('inpDat');
        if ($datAppoint == "") {            
            $datAppoint = date('Y/m/d');
        }
        $strJornada = $request->get('inpJor');
        if ($strJornada == "") {
            $strJornada = "1";
        }
        $strHomeScore = $request->get('inpHomeScore');
        if ($request->get('inpHomeScore') == "") {
            $strHomeScore = "0";
        }
        $strAwayScore = $request->get('inpAwayScore');
        if ($request->get('inpAwayScore') == "") {
            $strAwayScore = "0";
        }

        $objGame = new Game() ;
        $objGame->datetime     = $datAppoint;
        $objGame->journey      = $strJornada;
        $objGame->score_home   = $strHomeScore;        
        $objGame->score_away   = $strAwayScore;  
        $objGame->home_team_id = "1";     // $request->get('cmbHomeTeam');     // inpHomeTeam
        $objGame->home_club_id = $request->get('cmbHomeClub');
        $objGame->visitor_team_id = "1";  // $request->get('cmbAwayTeam');  // inpAwayTeam
        $objGame->away_club_id = $request->get('cmbAwayClub');

        // to do in next version... Referee
        // $objGame->referee_id = $request->get('inpReferee');                                
        $objGame->save() ;
        return redirect('/games' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // NO LA UTILITZEM
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_game)
    {
        $recordsetClubs = Club::all();
        // seria interesante filtrar por campo categoria (Alevin, Juvenil...)
        $recordsetTeams = Team::all();
        $objGame = Game::find($id_game);        
        return view('game.edit')
                    ->with('game',$objGame)
                    ->with('clubs',$recordsetClubs)
                    ->with('teams',$recordsetTeams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // echo "GameController::store...request->get('inpDat') vale: " . $request->get('inpDat') . "<br>";  
        // echo "GameController::store...request->get('inpJor') vale: " . $request->get('inpJor') . "<br>";  
        // echo "GameController::store...request->get('cmbHomeTeam') vale: " . $request->get('cmbHomeTeam') . "<br>";  
        // echo "GameController::store...request->get('cmbHomeClub') vale: " . $request->get('cmbHomeClub') . "<br>";  
        // echo "GameController::store...request->get('inpHomeScore') vale: " . $request->get('inpHomeScore') . "<br>";  
        // echo "GameController::store...request->get('inpAwayScore') vale: " . $request->get('inpAwayScore') . "<br>";
        // echo "GameController::store...request->get('cmbAwayClub') vale: " . $request->get('cmbAwayClub') . "<br>";        
        // echo "GameController::store...request->get('cmbAwayTeam') vale: " . $request->get('cmbAwayTeam') . "<br>";  
        // die;

        $request->validate([
            'cmbHomeClub' => ['required','different:cmbAwayClub'],
            'cmbAwayClub' => ['required','different:cmbHomeClub'],
            'inpDat' => 'required'
        ]);

        $datAppoint = $request->get('inpDat');
        if ($datAppoint == "") {            
            $datAppoint = date('Y/m/d');
        }
        $strJornada = $request->get('inpJor');
        if ($strJornada == "") {
            $strJornada = "1";
        }
        $strHomeScore = $request->get('inpHomeScore');
        if ($request->get('inpHomeScore') == "") {
            $strHomeScore = "0";
        }
        $strAwayScore = $request->get('inpAwayScore');
        if ($request->get('inpAwayScore') == "") {
            $strAwayScore = "0";
        }

        $objGame = Game::find($id);

        $objGame->datetime     = $datAppoint;
        $objGame->journey      = $strJornada;
        $objGame->score_home   = $strHomeScore;        
        $objGame->score_away   = $strAwayScore;        
        $objGame->home_team_id = "1";     // $request->get('cmbHomeTeam');     // inpHomeTeam
        $objGame->home_club_id = $request->get('cmbHomeClub');
        $objGame->visitor_team_id = "1";  // $request->get('cmbAwayTeam');  // inpAwayTeam
        $objGame->away_club_id = $request->get('cmbAwayClub');

        // to do in next version... Referee
        // $objGame->referee_id = $request->get('inpReferee');                                
        $objGame->save() ;
        return redirect('/games' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_game)
    {
        $objGame = Game::find($id_game);
        $objGame->delete() ;
        return redirect('/games' );
    }
}
