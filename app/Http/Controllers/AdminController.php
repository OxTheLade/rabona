<?php

namespace App\Http\Controllers;

use App\League;
use App\Post;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
    //
    public function index()
    {

        $postsCount = Post::count();
        $leaguesCount = League::count();
        $teamsCount = Team::count();
        $usersCount = User::count();

        //Retrieve Most Visited Pages
//        $pages = Analytics::fetchVisitorsAndPageViews(Period::days(7));


//        dd($pages);

        return view('admin.index', compact('postsCount', 'leaguesCount', 'teamsCount', 'usersCount', 'pages'));
    }
}
