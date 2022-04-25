@foreach ($posts as $post)                
@endforeach

<div class="row">
  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Beban AC 1</span>
        <div class="mt-2">
          <input type="checkbox" name="relay_1" data-off-color="danger" data-on-color="success" {{ $relay->relay_1 ? 'checked' : '' }}>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Beban AC 2</span>
        <div class="mt-2">
          <input type="checkbox" name="relay_2" data-off-color="danger" data-on-color="success" {{ $relay->relay_2 ? 'checked' : '' }}>
        </div>
      </div>
    </div>
  </div>

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-4">
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
{{-- @if ($post->battery_current <= $relay->current_limit)
  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Beban AC 1</span>
          <div class="mt-2">
            <input type="checkbox" name="relay_1" data-off-color="danger" data-on-color="success" {{ $relay->relay_1 ? 'checked' : '' }}>
          </div>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Beban AC 2</span>
          <div class="mt-2">
            <input type="checkbox" name="relay_2" data-off-color="danger" data-on-color="success" {{ $relay->relay_2 ? 'checked' : '' }}>
          </div>
        </div>
      </div>
    </div>

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-4">
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
@else
  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Beban AC 1</span>
          <div class="mt-2">
            <input readonly type="checkbox" name="relay_1" data-off-color="danger" data-on-color="success" {{ $relay->relay_1 ? 'checked' : '' }}>
          </div>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Beban AC 2</span>
          <div class="mt-2">
            <input readonly type="checkbox" name="relay_2" data-off-color="danger" data-on-color="success" {{ $relay->relay_2 ? 'checked' : '' }}>
          </div>
        </div>
      </div>
    </div>

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plug"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Beban AC 3</span>
          <div class="mt-2">
            <input readonly type="checkbox"  name="relay_3" data-off-color="danger" data-on-color="success" {{ $relay->relay_3 ? 'checked' : '' }}>
          </div>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div>
@endif --}}

<script src="https://code.jquery.com/jquery-latest.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script>
  $("[name='relay_1']").bootstrapSwitch();
  $("[name='relay_2']").bootstrapSwitch();
  $("[name='relay_3']").bootstrapSwitch();
      $(document).ready(function() {

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