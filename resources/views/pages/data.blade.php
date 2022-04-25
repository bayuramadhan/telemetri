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
          <!-- Small boxes (Stat box) -->
          <div id="command_relay" class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-charging-station"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Relay ATS</span>
                  <div class="mt-2">
                    <input type="checkbox" name="relay_ats" data-on-text="Solar" data-off-text="Battery" data-off-color="default" data-on-color="primary" {{ $relay->relay_ats ? 'checked' : '' }}>
                  </div>
                  {{-- <span class="info-box-number">Solar Charge System</span> --}}
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Beban AC 1</span>
                    <div class="mt-2">
                      <input type="checkbox" name="relay_1" data-off-color="danger" data-on-color="success" {{ $relay->relay_1 ? 'checked' : '' }}>
                    </div>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Beban AC 2</span>
                    <div class="mt-2">
                      <input type="checkbox" name="relay_2" data-off-color="danger" data-on-color="success" {{ $relay->relay_2 ? 'checked' : '' }}>
                    </div>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
    
              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>
    
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Beban AC 3</span>
                    <div class="mt-2">
                      <input type="checkbox" name="relay_3" data-off-color="danger" data-on-color="success" {{ $relay->relay_3 ? 'checked' : '' }}>
                    </div>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
          </div>
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

<script src="https://code.jquery.com/jquery-latest.js"></script>
<script>


    $(document).ready(function() {
    //     setInterval(function() {
    //        var page = window.location.href;
    //        $.ajax({
    //        url: page,
    //        success:function(data)
    //        {
    //         $('#commentarea').html(data);
    //        }
    //        });
    //      }, 1000);
        setInterval(function(){
        $('#my_div').load('/table');
        }, 5000); /* time in milliseconds (ie 2 seconds)*/

    });

</script>