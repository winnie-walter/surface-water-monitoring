@extends('layout.app')
@section('content')
<div class="container-fluid">
        <div class="box-body">
        <div class="row mb-3">
        <div class="col-lg-12">
                        <div class="card-body">
                        <h3 class="card-title">WATER MANAGEMENT: </h3>
                        <div id="temp"></div>
                        </div>
               </div>
               @can('Visalization Temperature')


                <div class="col-lg-6">
                    <div class="card dashboardCard">
                        <div class="card-header byserHeader">
                            <h3 class="card-title">Temperature</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="temperature">
                            </canvas>
                        </div>
                    </div>
                </div>
                @endcan
                @can('Visalization flowrate')


                <div class="col-lg-6">
                    <div class="card dashboardCard">
                        <div class="card-header byserHeader">
                            <h3 class="card-title">Flow Rate</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="flowrate">
                            </canvas>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
            @can('Visalization Water Level')
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="card dashboardCard">
                        <div class="card-header byserHeader">
                            <h3 class="card-title">Water Level</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="waterlevel">

                            </canvas>

                        </div>
                    </div>
                </div>

            </div>
            @endcan
        </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
//     function updateData() {
//     // Use jQuery's AJAX function to make a GET request to the server
//     $.get('/temp-data', function(data) {
//         // Update the contents of the real-time-data div with the new data
//         $('#temp').html(data);
//     });
// }

// temperature Graph.
  var ctx = document.getElementById("temperature");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [],
      datasets: [{
        label: 'temperature',
        data: [],
        borderColor: '#36A2EB',
        backgroundColor: '#9BD0F5',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes:[{
      scaleLabel: {
        display: true,
        labelString: 'Time (in minutes)'
      },
      ticks: {
        beginAtZero:true
      }
    }],
       yAxes: [{
      scaleLabel: {
        display: true,
        labelString: 'Temperature (C)'
      },
      ticks: {
        beginAtZero:true
      }
    }]
      }
    }
  });
  var updateChartTemp = function() {
    $.ajax({
      url: "{{ route('display.graphs') }}",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        myChart.data.labels = data.labels;
        myChart.data.datasets[0].data = data.data;
        myChart.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }


  // Flow Rate Graph.
  var ctx = document.getElementById("flowrate");
  var myChartRate = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [],
      datasets: [{
        label: 'Flow Rate',
        data: [],
        borderColor: '#36A2EB',
        backgroundColor: '#CFD8DC',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes:[{
      scaleLabel: {
        display: true,
        labelString: 'Time (in minutes)'
      },
      ticks: {
        beginAtZero:true
      }
    }],
       yAxes: [{
      scaleLabel: {
        display: true,
        labelString: 'Volume (metre Cubic)'
      },
      ticks: {
        beginAtZero:true
      }
    }]
      }
    }
  });
  var updateChartRate = function() {
    $.ajax({
      url: "{{ route('flowrate.graphs') }}",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        myChartRate.data.labels = data.labels;
        myChartRate.data.datasets[0].data = data.data;
        myChartRate.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }

   // Water Level Graph.
   var ctx = document.getElementById("waterlevel");
  var myChartWater = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Water-Level',
        data: [],
        borderColor: '#36A2EB',
        backgroundColor: '#BDBDBD',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes:[{
      scaleLabel: {
        display: true,
        labelString: 'Time (in minutes)'
      },
      ticks: {
        beginAtZero:true
      }
    }],
       yAxes: [{
      scaleLabel: {
        display: true,
        labelString: 'Meter'
      },
      ticks: {
        beginAtZero:true
      }
    }]
      }
    }
  });

  var updateChartWater = function() {
    $.ajax({
      url: "{{ route('water.graphs') }}",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        myChartWater.data.labels = data.labels;
        myChartWater .data.datasets[0].data = data.data;
        myChartWater.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }


  updateChartTemp();
  updateChartRate();
  updateChartWater();
  updateData();
  setInterval(() => {
    updateChartTemp();
    updateChartRate();
    updateChartWater();
    updateData();
  }, 1000);

  function myFunction(){
    console.log('fire');
  }
  setInterval(myFunction,1000);

  // setInterval(updateData, 5000);


</script>



@endsection
