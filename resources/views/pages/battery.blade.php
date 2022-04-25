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
  @foreach ($posts as $post)                
  @endforeach
  <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-bolt"></i></span>
        
              <div class="info-box-content">
                <span class="info-box-text">Arus Pembatas</span>
                <div class="mt-2">
                  <div class="input-group">
                    {{-- {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
                      {{Form::text('inverter_current', $relay->current_limit, ['class' => 'form-control', 'placeholder' => 'inverter_current'])}}
                      {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}    --}}
                    <input id="limit_value" type="text" class="form-control rounded-0" value={{$relay->current_limit}}>
                    <span class="input-group-append">
                      <button id="submit_currentlimit" type="button" class="btn btn-info">Set Batas</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-charging-station"></i></span>
        
              <div class="info-box-content">
                <span class="info-box-text">Relay ATS Baterai</span>
                <div class="mt-2">
                  <input type="checkbox" name="relay_ats" data-off-color="default" data-on-color="primary" {{ $relay->relay_ats ? 'checked' : '' }}>
                </div>
              </div>
            </div>
          </div>
        
        </div>
        <div id="div_switch">
          @include('div.switch')
        </div>
        <div id="div_relay">
          @include('div.relay')
        </div>
      </div>
  </section>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script>
  $(document).ready(function() {
    $('#div_switch').load('/div_switch');
    var div_relay = function(){
      $('#div_relay').load('/div_relay');
    };
    setInterval(function(){
      div_relay();
    }, 5000);
  });
</script>

<script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
  $("[name='relay_ats']").bootstrapSwitch();

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

        $('#submit_currentlimit').on('click', function () {
          var value = $("#limit_value").val(); 
          var id = 1; 
          $.ajax({
                type: "GET",
                dataType: "json",
                url: '/update_currentlimit',
                data: {'limit_value': value, 'id': id},
                success: function(data){
                  alert("Arus pembatas berhasil diubah!");
                }
            });
        });

      });
</script>
@endsection