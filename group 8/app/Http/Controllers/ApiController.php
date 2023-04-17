<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Flowrate;
use App\Models\Temperature;
use App\Models\Waterlevel;
use Illuminate\Support\Facades\Log;
class ApiController extends Controller
{
    public function flowrateadd($flowrate){

        
        //dd(Carbon::now()->toDateTimeString());
        $day = Carbon::parse(Carbon::now())->format('l');

        $flowrate = Flowrate::create([
          'flowrate' => $flowrate,
          'day'=>$day
        ]);
       
        return response()->json($flowrate);

    }
    public function savedata(Request $request){
       Log::info($request->fullUrl());
       Log::info($request->all());
        $temperature=$request->input('temperature');
        $flowrate=$request->input('flowrate');
        $waterlevel=$request->input('waterlevel');
        $day = Carbon::parse(Carbon::now())->format('l');

  $flowrates = Flowrate::create([
          'flowrate' => $flowrate,
          'day'=>$day
        ]);
        $temperatures = Temperature::create([
          'temperature' => $temperature,
          'day'=>$day
        ]);
        $waterlevels = Waterlevel::create([
          'waterlevel' => $waterlevel,
          'day'=>$day
        ]);

        return response()->json([
          'message'=>'successful'
        ]);

}


public function sensor($temperature, $flowrate, $waterlevel){

  $day = Carbon::parse(Carbon::now())->format('l');

  $flowrates = Flowrate::create([
          'flowrate' => $flowrate,
          'day'=>$day
        ]);
        $temperatures = Temperature::create([
          'temperature' => $temperature,
          'day'=>$day
        ]);
        $waterlevels = Waterlevel::create([
          'waterlevel' => $waterlevel,
          'day'=>$day
        ]);

        return response()->json([
          'message'=>'successful'
        ]);
}

}