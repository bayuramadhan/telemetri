@extends('layouts.layout')
@section('title')
    Home
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
@endsection
@section('title')
    {{-- Home --}}
@endsection
@section('inverter')
  class="nav-link"
@endsection
@section('solar')
  class="nav-link"    
@endsection
@section('battery')
  class="nav-link"
@endsection
@section('link_href')
<link href="bootstrap.css" rel="stylesheet">
<link href="bootstrap-switch.css" rel="stylesheet">

@endsection
@section('content') 
  <section class="content">
      <div class="container-fluid">
        @if(count($relays) > 1)
          @foreach ($relays as $relay)
              <p>{{$relay->relay_1}}</p>
              <p>{{$relay->relay_2}}</p>
              <p>{{$relay->relay_3}}</p>
              <p>{{$relay->created_at}}</p>
              {{-- <input data-id="{{$relay->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $relay->relay_1 ? 'checked' : '' }}> --}}
              <input data-id="{{$relay->id}}" type="checkbox" name="auto_reply" {{ $relay->relay_1 ? 'checked' : '' }}>

          @endforeach
        @else
          <p>no post found</p>
        @endif

      </div>
  </section>

@endsection
@section('script')
<script src="jquery.js"></script>
<script src="bootstrap-switch.js"></script>

  <script>
    $("[name='auto_reply']").bootstrapSwitch();
        $(document).ready(function() {
            $("[name='auto_reply']").on('switchChange.bootstrapSwitch',function(){
                var relay_1 = $(this).prop('checked') == true ? 1 : 0; 
                var id = $(this).data('id'); 
               
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/product_modreator',
                    data: {'relay_1': relay_1, 'id': id},
                    success: function(data){
                      alert("Auto Reply has been Turned On");
                    }
                });
            });
        });
  </script>
    
@endsection
