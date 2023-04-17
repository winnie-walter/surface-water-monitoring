<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Humidity;
use App\Models\Temperature;
use App\Models\Winddata;


class groupone extends Controller
{
    public function humidity(HumidityDataTable $datatable){
        return $dataTable->render('humidity');

    }
}
