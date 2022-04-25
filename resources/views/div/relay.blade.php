@foreach ($posts as $post)                
@endforeach
@if ($post->inverter_current >= $relay->current_limit)
<div class="row">
  <div class="col-md-12">
    <!-- LINE CHART -->
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Peringatan</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <p>Arus pada inverter telah melewati batas arus yang diizinkan. Relay beban dimatikan.</p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->         
  </div>

</div>
@endif

<div class="row mt-2">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        @if ($post->battery_percentage > 99)
          <h3>FULL</h3>
        @else
          <h3>EMPTY</h3>
        @endif
        {{-- <h3>{{$post->battery_percentage}} %</h3> --}}

        <p>Kapasitas Baterai</p>
      </div>
      <div class="icon">
        <i class="fas fa-percent"></i>
      </div>
      {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$post->battery_voltage}} Volt</h3>

        <p>Tegangan Baterai</p>
      </div>
      <div class="icon">
        <i class="fas fa-chevron-circle-down"></i>
      </div>
      {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$post->battery_current}} mA</h3>

        <p>Arus Baterai</p>
      </div>
      <div class="icon">
        <i class="fab fa-adn"></i>
      </div>
      {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{$post->battery_power}} Watt</h3>

        <p>Daya Baterai</p>
      </div>
      <div class="icon">
        <i class="fab fa-product-hunt"></i>
      </div>
      {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>
  <!-- ./col -->
  <p id="demo"></p>

</div>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script>
  $(document).ready(function() {
    var post = JSON.parse("{{ json_encode($post) }}".replace(/&quot;/g,'"'));
    var relay = JSON.parse("{{ json_encode($relay) }}".replace(/&quot;/g,'"'));
    var value = $("#limit_value").val(); 

    if( post.inverter_current >= relay.current_limit)
    {
      // document.getElementById("demo").innerHTML = post.battery_current + "," + relay.current_limit; 

      $('#div_switch').load('/div_switch');
    }
  });
</script>
