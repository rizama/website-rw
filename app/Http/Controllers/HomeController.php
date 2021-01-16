<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ret['total_persons'] = Person::all()->count();
        $ret['total_persons_permanent'] = Person::where("citizens_status_id",1)->count();
        $ret['total_persons_temporary'] = Person::where("citizens_status_id",2)->count();
        $chart_gender = Person::all()->groupBy("gender");
        $ret['chart_gender'] = [
            "wanita" => [
                "title" => "Wanita",
                "data" => $chart_gender['P']->count()
            ],
            "pria" => [
                "title" => "Pria",
                "data" => $chart_gender['L']->count()
            ]
        ];
        // dd($ret['chart_gender']);

        return view('home', $ret);
    }

    public function chart()
    {
        return view('home_chart');
    }
}
