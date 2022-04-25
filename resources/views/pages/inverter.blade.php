@extends('layouts.layout')
@section('title')
    Inverter
@endsection
{{-- @section('breadcrumb')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active"><a href="/inverter">Inverter</li>
@endsection --}}
@section('inverter')
  class="nav-link active"
@endsection
@section('solar')
  class="nav-link"    
@endsection
@section('battery')
  class="nav-link"
@endsection
@section('link_href')
  {{-- <link href="bootstrap.css" rel="stylesheet"> --}}
  {{-- <link href="bootstrap-switch.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') }}">

@endsection
@section('content')

  <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- LINE CHART -->
            <div class="card card-primary">
              <div class="card-header bg-danger">
                <h3 class="card-title">Grafik Garis Arus AC</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="inverterCurrent" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->         
          </div>
        </div>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!-- LINE CHART -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Grafik Garis Tegangan AC</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="inverterVoltage" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
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
{{-- <script src="jquery.js"></script> --}}
<script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<script>
  $.getJSON("/read_posts", function(data) {
    //-------------
    //- LINE CHART -
    //--------------
    var isi_labels = [];
    var data_inverter_voltage=[];
    var data_inverter_current=[];

    $(data).each(function(i){         
        isi_labels.push(data[i].created_at); 
        data_inverter_voltage.push(data[i].inverter_voltage);
        data_inverter_current.push(data[i].inverter_current);
    });

    var area_inverter_voltage = {
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
          data                : data_inverter_voltage
        }
      ]
    } 
    var area_inverter_current = {
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
          data                : data_inverter_current
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

    var inverterVoltageCanvas = $('#inverterVoltage').get(0).getContext('2d')
    var inverterVoltageOptions = jQuery.extend(true, {}, areaChartOptions)
    var inverterVoltageData = jQuery.extend(true, {}, area_inverter_voltage)
    inverterVoltageData.datasets[0].fill = false;
    inverterVoltageOptions.datasetFill = false
    var inverterVoltage = new Chart(inverterVoltageCanvas, { 
      type: 'line',
      data: inverterVoltageData, 
      options: inverterVoltageOptions
    })       
    var inverterCurrentCanvas = $('#inverterCurrent').get(0).getContext('2d')
    var inverterCurrentOptions = jQuery.extend(true, {}, areaChartOptions)
    var inverterCurrentData = jQuery.extend(true, {}, area_inverter_current)
    inverterCurrentData.datasets[0].fill = false;
    inverterCurrentOptions.datasetFill = false
    var inverterCurrent = new Chart(inverterCurrentCanvas, { 
      type: 'line',
      data: inverterCurrentData, 
      options: inverterCurrentOptions
    })


    var getData = function() {
      $.ajax({
        url: '/read_posts',
        success: function(data) {
          // process your data to pull out what you plan to use to update the chart
          // e.g. new label and a new data point
          
          // add new label and data point to chart's underlying data structures
          inverterVoltage.data.labels = [];
          inverterVoltage.data.datasets[0].data = [];
          inverterCurrent.data.labels = [];
          inverterCurrent.data.datasets[0].data = [];
          $(data).each(function(i){         
            inverterVoltage.data.labels.push(data[i].created_at); 
            inverterVoltage.data.datasets[0].data.push(data[i].inverter_voltage);
            inverterCurrent.data.labels.push(data[i].created_at); 
            inverterCurrent.data.datasets[0].data.push(data[i].inverter_current);
          });
          // inverterIntensity.data.labels.push("Post " + postId);
          // inverterIntensity.data.datasets[0].data.push(data[postId++].inverter_voltage);

          // re-render the chart
          inverterVoltage.update();
          inverterCurrent.update();

        }
      });
    };

    // get new data every 3 seconds
    setInterval(function(){
      getData();
    }, 2000);
  });

</script>

<script>
  $("[name='relay_ats']").bootstrapSwitch();
  $("[name='relay_1']").bootstrapSwitch();
  $("[name='relay_2']").bootstrapSwitch();
  $("[name='relay_3']").bootstrapSwitch();
  $("[name='auto_reply']").bootstrapSwitch();
      $(document).ready(function() {
          $("[name='relay_ats']").on('switchChange.bootstrapSwitch',function(){
              var value = $(this).prop('checked') == true ? 1 : 0; 
              var id = 1; 
              
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/update_relay',
                  data: {'relay_name': 'relay_ats', 'value': value, 'id': id},
                  success: function(data){
                    alert("Relay ATS berhasil diubah!"); 
                  }
              });
          });

          $("[name='relay_1']").on('switchChange.bootstrapSwitch',function(){
              var value = $(this).prop('checked') == true ? 1 : 0; 
              var id = 1; 
              
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/update_relay',
                  data: {'relay_name': 'relay_1', 'value': value, 'id': id},
                  success: function(data){
                    alert("Beban AC 1 berhasil diubah!");
                  }
              });
          });

          $("[name='relay_2']").on('switchChange.bootstrapSwitch',function(){
              var value = $(this).prop('checked') == true ? 1 : 0; 
              var id = 1; 
              
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/update_relay',
                  data: {'relay_name': 'relay_2', 'value': value, 'id': id},
                  success: function(data){
                    alert("Beban AC 2 berhasil diubah!");
                  }
              });
          });

          $("[name='relay_3']").on('switchChange.bootstrapSwitch',function(){
              var value = $(this).prop('checked') == true ? 1 : 0; 
              var id = 1; 
              
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/update_relay',
                  data: {'relay_name': 'relay_3', 'value': value, 'id': id},
                  success: function(data){
                    alert("Beban AC 3 berhasil diubah!");
                  }
              });
          });
      });
</script>
  
@endsection