<!DOCTYPE html>
<html lang="en">
<head>
    
@include('pdf.bootstrap')
</head>
<body>

<div class="container-fluid">
        <div class="box-body">
            <div class="card px-3">
               
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-12 text-center">
                            <h4>
                                <strong>WATER MANAGEMENT MONITORING SYSTEM</strong>
                            </h4>
                            <h4>
                                <strong>REPORT OF WATERLEVEL DATA COLLECTED {{ now()->format('F') }}</strong> <strong
                                    class="ml-1">{{ now()->year }}</strong>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="float-left">
                            <strong>Waterlevel (m) </strong>
                        </h5>
                    </div>
                   
                       
                            <div class="row mb-3">
                                <div class="table-responsive px-3">
                                    <table class="table table-bordered" id="report_table" style="border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th style="width: 5px">SN</th>
                                                <th class="text-center">Waterlevel</th>
                                                <th class="text-center">Day </th>
                                                <th class="text-center">Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $waterlevel)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $waterlevel->waterlevel }}</td>
                                                    <td>{{ $waterlevel->day }}</td>
                                                    <td>{{ $waterlevel->created_at }}</td>
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
</body>
</html>