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

<script>
  $(document).ready(function() {
    var div_relay = function(){
      $('#div_relay').load('/div_relay');
    };
    var div_switch = function(){
      var relay = JSON.parse("{{ json_encode($relay) }}");
      if( relay.relay_ats == 1)
      {
        $('#div_relay').load('/div_relay');
      }
    }
    setInterval(function(){
      // div_relay();
      div_switch();
    }, 5000);
  });
</script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
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

        $('#submit_currentlimit').on('click', function () {
          var value = $("#limit_value").val(); 
          var id = 1; 
          $.ajax({
                type: "GET",
                dataType: "json",
                url: '/update_currentlimit',
                data: {'limit_value': value, 'id': id},
                success: function(data){
                  // alert("Beban AC 3 berhasil diubah!");
                }
            });
        });

      });
</script>
@endsection