<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Relay;

class PagesController extends Controller
{
    public function inverter()
    {
        $relay = Relay::find(1);
        // return $relay;
        return view('pages.inverter')->with('relay', $relay);
    }

    public function div_relay()
    {
        $relay = Relay::find(1);
        $posts = DB::select('SELECT * FROM posts ORDER BY id DESC LIMIT 1');
        // return $relay;
        return view('div.relay', compact('posts', 'relay'))->render();
    }

    public function div_switch()
    {
        $relay = Relay::find(1);
        $posts = DB::select('SELECT * FROM posts ORDER BY id DESC LIMIT 1');
        // return $relay;
        return view('div.switch', compact('posts', 'relay'))->render();
    }

    public function solar()
    {
        return view('pages.solar');
    }
    public function battery()
    {
        $relay = Relay::find(1);
        $posts = DB::select('SELECT * FROM posts ORDER BY id DESC LIMIT 1');
        // return $relay;
        return view('pages.battery', compact('posts', 'relay'))->render();

        // return view('pages.battery');
    }

    public function update_relay(Request $request)
    {
        $relay = Relay::find($request->id);
        $relay_name = $request->relay_name;
        $relay->$relay_name = $request->value;
        $relay->save();
    }
    public function update_currentlimit(Request $request)
    {
        $relay = Relay::find($request->id);
        $relay->current_limit = $request->limit_value;
        $relay->save();
        return $request;
    }
    public function read_posts()
    {
        // $posts = Post::orderBy('id', 'desc')->get();
        $posts = DB::select('SELECT    * 
        FROM      (SELECT * FROM posts ORDER BY id DESC LIMIT 15) dt
        ORDER BY id ASC');
        // return $posts;
        return response()->json($posts);

    }

    public function arduino_update($inverter_current, $inverter_voltage, $solar_current,
     $solar_voltage, $solar_intensity, $battery_current, $battery_voltage, $inverter_power, $solar_power, $battery_power, $battery_percentage)

    {
        $post = new Post;
        $post->inverter_current =$inverter_current;
        $post->inverter_voltage =$inverter_voltage;
        $post->solar_current =$solar_current;
        $post->solar_voltage =$solar_voltage;
        $post->solar_intensity =$solar_intensity;
        $post->battery_current =$battery_current;
        $post->battery_voltage =$battery_voltage;
        $post->inverter_power =$inverter_power;
        $post->solar_power =$solar_power;
        $post->battery_power =$battery_power;
        $post->battery_percentage =$battery_percentage;
        $post->save();

        return response()->json($post);
    }
    public function arduino_relays()
    {
        $relay = Relay::find(1);
        // return $posts;
        return response()->json($relay);
    }

    public function arduino_relays_off()
    {
        $relay = Relay::find(1);
        $relay->relay_1 = 0;
        $relay->relay_2 = 0;
        $relay->relay_3 = 0;

        $relay->save();

        return response()->json($relay);
    }
}
