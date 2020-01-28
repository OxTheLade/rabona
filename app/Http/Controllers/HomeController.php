<?php

namespace App\Http\Controllers;

use App\League;
use App\Post;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        $leagues = League::where('name', 'Premier League')->get();




        return view('index', compact('posts', 'leagues'));
    }
    public function posts(){

        $posts = Post::where('post_type', 0)->orderBy('created_at', 'desc')->paginate(10);



        return view('all_news', compact('posts'));


    }

    public function rumours() {

        $posts = Post::where('post_type', 1)->orderBy('created_at', 'desc')->paginate(10);


        return view('all_rumours', compact('posts'));
    }

    public function leagueTables() {

        $leagues = League::get()->all();

//        $team = Team::orderBy('points', 'asc')->get();


        return view('league_tables', compact('leagues'));
    }

}



