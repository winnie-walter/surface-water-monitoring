@extends('layout.app')
@section('content') 


<div class="container-fluid">
        <div class="box-body">
            <div class="card px-3">
                @can('Generate Report flowrate')
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right">
                                <a href="{{ route('generateflow') }}" class="btn-small byser-button"><i class="fas fa-file mr-2"></i>Generate report</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-12 text-center">
                            <h4>
                                <strong>WATER MANAGEMENT MONITORING SYSTEM</strong>
                            </h4>
                            <h4>
                                <strong>REPORT OF FLOWRATE DATA COLLECTED {{ now()->format('F') }}</strong> <strong
                                    class="ml-1">{{ now()->year }}</strong>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="float-left">
                            <strong>Flowrate  (v/t)</strong>
                        </h5>
                    </div>
                   
                       
                            <div class="row mb-3">
                                <div class="table-responsive px-3">
                                    <table class="table table-bordered" id="report_table" style="border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th style="width: 5px">SN</th>
                                                <th class="text-center">Flowrate</th>
                                                <th class="text-center">Day </th>
                                                <th class="text-center">Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $flowrate)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $flowrate->flowrate }}</td>
                                                    <td>{{ $flowrate->day }}</td>
                                                    <td>{{ $flowrate->created_at }}</td>
                                                </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>     
                            
                   
                </div>
            </div>
        </div>
    </div>
@endsection


