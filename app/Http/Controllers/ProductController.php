<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relay;

class ProductController extends Controller
{
    public function index()
    {
        $relays = Relay::all();
        return view('relays.index')->with('relays', $relays);
    }

    public function product_modreator(Request $request)
    {
        $relay = Relay::find($request->id);
        $relay->relay_1 = $request->relay_1;
        $relay->save();
        // return $request->id;
        // return response()->json(['success'=>'Status change successfully.']);
    }
}
