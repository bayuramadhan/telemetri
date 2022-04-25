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
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-md-12">
                            <!-- BAR CHART -->
              <div class="card card-indigo">
                <div class="card-header">
                  <h3 class="card-title">Summary</h3>

                  {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div> --}}
                </div>
                <div class="card-body">
                  <p>Sistem monitoring online ini memberikan informasi daya yang dihasilkan oleh Photovoltaic terhadap intensitas cahaya yang diterima. Sistem ini juga memberikan informasi penggunaan daya pada beban yang tersambung, serta memungkinkan melakukan pembatasan beban dan pengendalian daya melalui website.</p>
                  @guest
                    <p><strong>Silakan Login untuk memulai.</strong></p>
                  @else
                    <p>Login berhasil. Selamat datang, <strong>{{ Auth::user()->name }}</strong></p>
                  @endguest
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->    
            </div>
          </div>
      </div>
  </section>

@endsection
