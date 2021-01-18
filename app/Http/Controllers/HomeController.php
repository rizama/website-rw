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

        $chart_rt = Person::all()->groupBy("rt_number");
        $ret['chart_rt'] = [
            "rt1" => [
                "title" => "RT 1",
                "data" => $chart_rt['1']->count()
            ],
            "rt2" => [
                "title" => "RT 2",
                "data" => $chart_rt['2']->count()
            ],
            "rt3" => [
                "title" => "RT 3",
                "data" => $chart_rt['3']->count()
            ],
            "rt4" => [
                "title" => "RT 4",
                "data" => $chart_rt['4']->count()
            ],
            "rt5" => [
                "title" => "RT 5",
                "data" => $chart_rt['5']->count()
            ]
        ];

        // Chart By Gender
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

        // Chart Bu Education
        $chart_education = Person::all()->load('education')->groupBy("education_id");
        
        $data_chart_education = [];
        foreach ($chart_education as $key => $value) {
            $rand_color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            $body = [
                "name" => $value[0]->education['name'],
                "y" => $value->count()
            ];

            array_push($data_chart_education, $body);
        }
        $ret['data_chart_education'] = $data_chart_education;

        // Chart By Work
        $chart_job = Person::all()->load('job')->groupBy("job_id");

        $data_chart_job = [];
        foreach ($chart_job as $key => $value) {
            $rand_color = '#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
            $body = [
                "name" => $value[0]->job['name'],
                "y" => $value->count()
            ];

            array_push($data_chart_job, $body);
        }
        $ret['data_chart_job'] = $data_chart_job;

        // Chart By Status
        $chart_status = Person::all()->load('status')->groupBy("citizens_status_id");

        $data_chart_status = [];
        foreach ($chart_status as $key => $value) {
            $rand_color = '#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
            $body = [
                "name" => $value[0]->status['name'],
                "y" => $value->count()
            ];

            array_push($data_chart_status, $body);
        }
        $ret['data_chart_status'] = $data_chart_status;

        return view('home', $ret);
    }

    public function chart()
    {
        return view('home_chart');
    }
}
