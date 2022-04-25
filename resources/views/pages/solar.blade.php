@extends('layouts.layout')
@section('title')
    Solar Charge System
@endsection
{{-- @section('breadcrumb')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active"><a href="/solar">Solar Charge System</li>
@endsection --}}
@section('inverter')
  class="nav-link"
@endsection
@section('solar')
  class="nav-link active"    
@endsection
@section('battery')
  class="nav-link"
@endsection
@section('content')

  <section class="content">

      <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="card card-primary">
                <div class="card-header bg-danger">
                  <h3 class="card-title">Grafik Garis Arus DC</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="solarCurrent" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->     
              
              <!-- LINE CHART -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Grafik Garis Tegangan DC</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="solarVoltage" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->   
            </div>

            <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="card card-primary">
                <div class="card-header bg-info">
                  <h3 class="card-title">Grafik Daya</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="solarPower" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->   
              <!-- LINE CHART -->
              <div class="card card-primary">
                <div class="card-header bg-success">
                  <h3 class="card-title">Grafik Garis Intensitas Cahaya</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="solarIntensity" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
    var data_solar_voltage=[];
    var data_solar_current=[];
    var data_solar_intensity=[];
    var data_solar_power=[];


    $(data).each(function(i){         
        isi_labels.push(data[i].created_at); 
        data_solar_voltage.push(data[i].solar_voltage);
        data_solar_current.push(data[i].solar_current);
        data_solar_intensity.push(data[i].solar_intensity);
        data_solar_power.push(data[i].solar_power);

    });

    var area_solar_voltage = {
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
          data                : data_solar_voltage
        }
      ]
    } 
    var area_solar_current = {
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
          data                : data_solar_current
        }
      ]
    }
    var area_solar_intensity = {
      labels  : isi_labels,
      datasets: [
        {
          label               : 'Lux',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          // pointRadius          : false,
          // pointColor          : '#3b8bba',
          // pointStrokeColor    : 'rgba(60,141,188,1)',
          // pointHighlightFill  : '#fff',
          // pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data_solar_intensity
        }
      ]
    }
    var area_solar_power = {
      labels  : isi_labels,
      datasets: [
        {
          label               : 'Watt',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          // pointRadius          : false,
          // pointColor          : '#3b8bba',
          // pointStrokeColor    : 'rgba(60,141,188,1)',
          // pointHighlightFill  : '#fff',
          // pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data_solar_power
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

    var solarVoltageCanvas = $('#solarVoltage').get(0).getContext('2d')
    var solarVoltageOptions = jQuery.extend(true, {}, areaChartOptions)
    var solarVoltageData = jQuery.extend(true, {}, area_solar_voltage)
    solarVoltageData.datasets[0].fill = false;
    solarVoltageOptions.datasetFill = false

    var solarVoltage = new Chart(solarVoltageCanvas, { 
      type: 'line',
      data: solarVoltageData, 
      options: solarVoltageOptions
    })
    

    
    var solarCurrentCanvas = $('#solarCurrent').get(0).getContext('2d')
    var solarCurrentOptions = jQuery.extend(true, {}, areaChartOptions)
    var solarCurrentData = jQuery.extend(true, {}, area_solar_current)
    solarCurrentData.datasets[0].fill = false;
    solarCurrentOptions.datasetFill = false

    var solarCurrent = new Chart(solarCurrentCanvas, { 
      type: 'line',
      data: solarCurrentData, 
      options: solarCurrentOptions
    })

    var solarIntensityCanvas = $('#solarIntensity').get(0).getContext('2d')
    var solarIntensityOptions = jQuery.extend(true, {}, areaChartOptions)
    var solarIntensityData = jQuery.extend(true, {}, area_solar_intensity)
    solarIntensityData.datasets[0].fill = false;
    solarIntensityOptions.datasetFill = false

    var solarIntensity = new Chart(solarIntensityCanvas, { 
      type: 'line',
      data: solarIntensityData, 
      options: solarIntensityOptions
    })

    var solarPowerCanvas = $('#solarPower').get(0).getContext('2d')
    var solarPowerOptions = jQuery.extend(true, {}, areaChartOptions)
    var solarPowerData = jQuery.extend(true, {}, area_solar_power)
    solarPowerData.datasets[0].fill = false;
    solarPowerOptions.datasetFill = false

    var solarPower = new Chart(solarPowerCanvas, { 
      type: 'line',
      data: solarPowerData, 
      options: solarPowerOptions
    })


    var getData = function() {
      $.ajax({
        url: '/read_posts',
        success: function(data) {
          // process your data to pull out what you plan to use to update the chart
          // e.g. new label and a new data point
          
          // add new label and data point to chart's underlying data structures
          solarIntensity.data.labels = [];
          solarIntensity.data.datasets[0].data = [];
          solarVoltage.data.labels = [];
          solarVoltage.data.datasets[0].data = [];
          solarCurrent.data.labels = [];
          solarCurrent.data.datasets[0].data = [];
          solarPower.data.labels = [];
          solarPower.data.datasets[0].data = [];
          $(data).each(function(i){         
            solarIntensity.data.labels.push(data[i].created_at); 
            solarIntensity.data.datasets[0].data.push(data[i].solar_intensity);
            solarVoltage.data.labels.push(data[i].created_at); 
            solarVoltage.data.datasets[0].data.push(data[i].solar_voltage);
            solarCurrent.data.labels.push(data[i].created_at); 
            solarCurrent.data.datasets[0].data.push(data[i].solar_current);
            solarPower.data.labels.push(data[i].created_at); 
            solarPower.data.datasets[0].data.push(data[i].solar_power);
          });
          // solarIntensity.data.labels.push("Post " + postId);
          // solarIntensity.data.datasets[0].data.push(data[postId++].battery_voltage);

          // re-render the chart
          solarIntensity.update();
          solarVoltage.update();
          solarCurrent.update();
          solarPower.update();

        }
      });
    };
    // get new data every 3 seconds
    setInterval(getData, 2000);
    })
  </script>
@endsection