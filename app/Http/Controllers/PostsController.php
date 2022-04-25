<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('id', 'asc')->get();
        // return Post::where('id', 2)->get();
        // $posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('id', 'asc')->take(2)->get();
        // $posts = Post::orderBy('id', 'asc')->paginate(1);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'inverter_current' => 'required',
            'inverter_voltage' => 'required',
            'solar_current' => 'required',
            'solar_voltage' => 'required',
            'solar_intensity' => 'required',
            'battery_current' => 'required',
            'battery_voltage' => 'required'
        ]); //ga boleh kosong artinya
        
        $post = new Post;
        $post->inverter_current =$request->input('inverter_current');
        $post->inverter_voltage =$request->input('inverter_voltage');
        $post->solar_current =$request->input('solar_current');
        $post->solar_voltage =$request->input('solar_voltage');
        $post->solar_intensity =$request->input('solar_intensity');
        $post->battery_current =$request->input('battery_current');
        $post->battery_voltage =$request->input('battery_voltage');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->inverter_current =$request->input('inverter_current');
        $post->inverter_voltage =$request->input('inverter_voltage');
        $post->solar_current =$request->input('solar_current');
        $post->solar_voltage =$request->input('solar_voltage');
        $post->solar_intensity =$request->input('solar_intensity');
        $post->battery_current =$request->input('battery_current');
        $post->battery_voltage =$request->input('battery_voltage');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }


}
