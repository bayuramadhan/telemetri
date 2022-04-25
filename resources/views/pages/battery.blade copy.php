@extends('layouts.layout')
@section('title')
    Battery
@endsection
{{-- @section('breadcrumb')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active"><a href="/battery">Battery</li>
@endsection --}}

@section('inverter')
  class="nav-link"
@endsection
@section('solar')
  class="nav-link"    
@endsection
@section('battery')
  class="nav-link active"
@endsection
@section('content')

  <section class="content">

      <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!-- LINE CHART -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Grafik Tegangan AC</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="batteryVoltage" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->         
            </div>

          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- LINE CHART -->
              <div class="card card-primary">
                <div class="card-header bg-danger">
                  <h3 class="card-title">Grafik Arus</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="batteryCurrent" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->         
            </div>

          </div>
      </div>
  </section>

@endsection

@section('script')
<script>
  $.getJSON("/read_posts", function(data) {
    //-------------
    //- LINE CHART -
    //--------------
    var isi_labels = [];
    var data_battery_voltage=[];
    var data_battery_current=[];

    $(data).each(function(i){         
        isi_labels.push(data[i].created_at); 
        data_battery_voltage.push(data[i].battery_voltage);
        data_battery_current.push(data[i].battery_current);
    });

    var area_battery_voltage = {
      labels  : isi_labels,
      datasets: [
        {
          label               : 'Volt DC',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          // pointRadius          : false,
          // pointColor          : '#3b8bba',
          // pointStrokeColor    : 'rgba(60,141,188,1)',
          // pointHighlightFill  : '#fff',
          // pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data_battery_voltage
        }
      ]
    } 
    var area_battery_current = {
      labels  : isi_labels,
      datasets: [
        {
          label               : 'miliAmpere',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          // pointRadius          : false,
          // pointColor          : '#3b8bba',
          // pointStrokeColor    : 'rgba(60,141,188,1)',
          // pointHighlightFill  : '#fff',
          // pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data_battery_current
        }
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    var batteryVoltageCanvas = $('#batteryVoltage').get(0).getContext('2d')
    var batteryVoltageOptions = jQuery.extend(true, {}, areaChartOptions)
    var batteryVoltageData = jQuery.extend(true, {}, area_battery_voltage)
    batteryVoltageData.datasets[0].fill = false;
    batteryVoltageOptions.datasetFill = false

    var batteryVoltage = new Chart(batteryVoltageCanvas, { 
      type: 'line',
      data: batteryVoltageData, 
      options: batteryVoltageOptions
    })
    

    
    var batteryCurrentCanvas = $('#batteryCurrent').get(0).getContext('2d')
    var batteryCurrentOptions = jQuery.extend(true, {}, areaChartOptions)
    var batteryCurrentData = jQuery.extend(true, {}, area_battery_current)
    batteryCurrentData.datasets[0].fill = false;
    batteryCurrentOptions.datasetFill = false

    var batteryCurrent = new Chart(batteryCurrentCanvas, { 
      type: 'line',
      data: batteryCurrentData, 
      options: batteryCurrentOptions
    })


    var getData = function() {
      $.ajax({
        url: '/read_posts',
        success: function(data) {
          // process your data to pull out what you plan to use to update the chart
          // e.g. new label and a new data point
          
          // add new label and data point to chart's underlying data structures
          batteryVoltage.data.labels = [];
          batteryVoltage.data.datasets[0].data = [];
          batteryCurrent.data.labels = [];
          batteryCurrent.data.datasets[0].data = [];
          $(data).each(function(i){         
            batteryVoltage.data.labels.push(data[i].created_at); 
            batteryVoltage.data.datasets[0].data.push(data[i].battery_voltage);
            batteryCurrent.data.labels.push(data[i].created_at); 
            batteryCurrent.data.datasets[0].data.push(data[i].battery_current);
          });
          // batteryIntensity.data.labels.push("Post " + postId);
          // batteryIntensity.data.datasets[0].data.push(data[postId++].battery_voltage);

          // re-render the chart
          batteryVoltage.update();
          batteryCurrent.update();

        }
      });
    };
    // get new data every 3 seconds
    setInterval(getData, 2000);
    })
</script>



@endsection