<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Models\Temperature;
use App\Models\Waterlevel;

use App\Models\Flowrate;
//use Barryvdh\DomPDF;
class ReportController extends Controller
{ 

    public function reporttemp()
    {
        $currentMonth = now()->month;
        $data = Temperature::whereMonth('created_at', $currentMonth)->get();
        return view('report',compact('data'));
    }

    public function generatePDFtemp()

    {
        $currentMonth = now()->month;
        $data = Temperature::whereMonth('created_at', $currentMonth)->get();

       $pdf = PDF::loadView('pdf.tempreport', compact('data'))->setOptions(['defaultFont' => 'sans-serif']);
       return $pdf->download('tempreport.pdf');
    }

    public function reportflow()
    {
        $currentMonth = now()->month;
        $data = Flowrate::whereMonth('created_at', $currentMonth)->get();
        return view('flowrateriport',compact('data'));
    }

    public function generatePDFflow()

    {
        $currentMonth = now()->month;
        $data = Flowrate::whereMonth('created_at', $currentMonth)->get();

       $pdf = PDf::loadView('pdf.flowrate_report', compact('data'))->setOptions(['defaultFont' => 'sans-serif']);
       return $pdf->download('flowratereport.pdf');
    }


    public function reportwaterlevel()
    {
        $currentMonth = now()->month;
        $data = Waterlevel::whereMonth('created_at', $currentMonth)->get();
    
        return view('waterlevelreport',compact('data'));
    }

    public function generatePDFwater()

    {
        $currentMonth = now()->month;
        $data = Waterlevel::whereMonth('created_at', $currentMonth)->get();

       $pdf = PDf::loadView('pdf.waterrepo', compact('data'))->setOptions(['defaultFont' => 'sans-serif']);
       return $pdf->download('waterlevelreport.pdf');
    }
    //
}
