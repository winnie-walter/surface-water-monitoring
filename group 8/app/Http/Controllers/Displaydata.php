<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\DashboardCharts;
use App\Models\Waterlevel;
use App\Models\Temperature;
use App\Models\Flowrate;
use App\DataTables\FlowrateDataTable;
use App\DataTables\TemperatureDataTable;
use App\DataTables\WaterlevelDataTable;
use Carbon\Carbon;

class Displaydata extends Controller
{
    // public function home(){
    //     return view('home');
    // }

    public function humidity(WaterlevelDataTable $datatable){
        return $datatable->render('Water-level');
    }

    public function temperature(TemperatureDataTable $datatable){
        return $datatable->render('temperature');
    }
    public function wind(FlowrateDataTable $datatable){
        return $datatable->render('Flow-Rate');
    }

    public function disp_graph(){
        return view('graphs');
    }

    public function temp_graph(){


        $temp = Temperature::latest('created_at', 'ASC')->take(20)->get();
        // $temp->created_at->format('H:i:s');//e.g. 15:30:00
        $data = $temp->pluck('temperature');
        $labels = $temp->map(function($item){
            return $item->created_at->format('H:i:s');
        });

        return response()->json(['data' => $data, 'labels' => $labels]);



    }

    public function waterlevel_graph(){


        $humidity = Waterlevel::latest('created_at', 'ASC')->take(20)->get();
        // $temp->created_at->format('H:i:s');//e.g. 15:30:00
        $data = $humidity->pluck('waterlevel');
        $labels = $humidity->map(function($item){
            return $item->created_at->format('H:i:s');
           

        });

        return response()->json(['data' => $data, 'labels' => $labels]);



    }

    public function flowrate(){

        $speeds = Flowrate::latest('created_at', 'ASC')->take(20)->get();
       
        $data = $speeds->pluck('flowrate');
        $labels = $speeds->map(function($item){
            return $item->created_at->format('H:i:s');
        });
        return response()->json(compact('labels', 'data'));

    }
   

    public function flowrateadd(){

        $speeds = Flowrate::orderBy('created_at', 'DESC')->get();
        $labels = $speeds->pluck('id');
        $data = $speeds->pluck('flowrate');
        dd(Carbon::now()->toDateTimeString());
        return response()->json(compact('labels', 'data'));

    }
}
