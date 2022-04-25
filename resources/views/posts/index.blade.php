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

@section('content')
  <section class="content">
      <div class="container-fluid">
        @if(count($posts) > 1)
          @foreach ($posts as $post)
            <p>{{$post->inverter_current}}</p>
            <p>{{$post->inverter_voltage}}</p>
            <p>{{$post->created_at}}</p>
            {{-- {{$posts->links()}} --}}
          @endforeach
        @else
          <p>no post found</p>
        @endif
      </div>
  </section>

@endsection
