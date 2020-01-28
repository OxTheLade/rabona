<?php

namespace App\Http\Controllers;

use App\League;
use App\Photo;
use App\Team;
use Illuminate\Http\Request;

class AdminTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $teams = Team::where('league_id', $id)->paginate(10);

        $league = League::findOrFail($id);




        return view('admin.leagues.teams.index', compact('teams', 'league'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $leagues = League::pluck('name', 'id')->all();

        return view('admin.leagues.teams.create', compact('leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $team = new Team();

        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;


        }

        $team->create($input);

        return redirect('admin/leagues/');
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
    public function edit($id)
    {
        //
        $team = Team::findOrFail($id);

        $leagues = League::pluck('name', 'id')->all();

        return view('admin.leagues.teams.edit', compact('team', 'leagues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $team = Team::whereId($id)->first();

        $input = $request->all();

        $team->update($input);

        return redirect('/admin/leagues');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $team = Team::findOrFail($id);

        $team->delete();

        return redirect('/admin/leagues');
    }
}
