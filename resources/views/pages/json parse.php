<!DOCTYPE html>
<html>
<body>

<h2>Convert a string into a date object.</h2>
@foreach ($posts as $post)                
@endforeach
<p id="demo"></p>

<script>
var post = JSON.parse("{{ json_encode($post) }}".replace(/&quot;/g,'"'));
var relay = JSON.parse("{{ json_encode($relay) }}".replace(/&quot;/g,'"'));

document.getElementById("demo").innerHTML = post.battery_current + "," + relay.current_limit; 
</script>

</body>
</html>
