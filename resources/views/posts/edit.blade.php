@extends('layouts.layout')
@section('title')
    Edit
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

@section('content')
  <section class="content">
      <div class="container-fluid">
        {{-- {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('inverter_current', 'inverter_current')}}
                {{Form::text('inverter_current', $post->inverter_current, ['class' => 'form-control', 'placeholder' => 'inverter_current'])}}
            </div>
            <div class="form-group">
                {{Form::label('inverter_voltage', 'inverter_voltage')}}
                {{Form::text('inverter_voltage', $post->inverter_voltage, ['class' => 'form-control', 'placeholder' => 'inverter_voltage'])}}
            </div>
            <div class="form-group">
                {{Form::label('inverter_intensity', 'inverter_intensity')}}
                {{Form::text('inverter_intensity', $post->inverter_intensity, ['class' => 'form-control', 'placeholder' => 'inverter_intensity'])}}
            </div>            
            <div class="form-group">
                {{Form::label('solar_current', 'solar_current')}}
                {{Form::text('solar_current', $post->solar_current, ['class' => 'form-control', 'placeholder' => 'solar_current'])}}
            </div>
            <div class="form-group">
                {{Form::label('solar_voltage', 'solar_voltage')}}
                {{Form::text('solar_voltage', $post->solar_voltage, ['class' => 'form-control', 'placeholder' => 'solar_voltage'])}}
            </div>
            <div class="form-group">
                {{Form::label('battery_current', 'battery_current')}}
                {{Form::text('battery_current', $post->battery_current, ['class' => 'form-control', 'placeholder' => 'battery_current'])}}
            </div>
            <div class="form-group">
                {{Form::label('battery_voltage', 'battery_voltage')}}
                {{Form::text('battery_voltage', $post->battery_voltage, ['class' => 'form-control', 'placeholder' => 'battery_voltage'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}    --}}

        {{-- //modifikasi Edit --}}
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
            {{Form::hidden('inverter_current', 51)}}
            {{Form::hidden('inverter_voltage', 51)}}
            {{Form::hidden('solar_current', 51)}}
            {{Form::hidden('solar_voltage', 51)}}
            {{Form::hidden('solar_intensity', 51)}}
            {{Form::hidden('battery_current', 51)}}
            {{Form::hidden('battery_voltage', 51)}}
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}   
      </div>
  </section>

@endsection
