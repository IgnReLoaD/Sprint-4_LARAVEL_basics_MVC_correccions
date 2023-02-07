<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        // echo "GameController ... index";
        // die;
        $recordsetGames = Game::all() ;          
        return view('game.index')->with('recordsetGames', $recordsetGames);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objGame = new Game() ;
        $objGame->datetime     = $request->get('inpDat');
        $objGame->journey      = $request->get('inpJor');
        $objGame->home_team_id = $request->get('inpHomeTeam');
        $objGame->score_home   = $request->get('inpHomeScore');
        $objGame->visitor_team_id = $request->get('inpAwayTeam');
        $objGame->score_away   = $request->get('inpAwayScore');
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
        $objGame = Game::find($id_game) ;        
        return view('game.edit')->with('game',$objGame);
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
        $objGame = Game::find($id);        
        $objGame->datetime     = $request->get('inpDat');
        $objGame->journey      = $request->get('inpJor');
        $objGame->home_team_id = $request->get('inpHomeTeam');
        $objGame->score_home   = $request->get('inpHomeScore');
        $objGame->visitor_team_id = $request->get('inpAwayTeam');
        $objGame->score_away   = $request->get('inpAwayScore');
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
