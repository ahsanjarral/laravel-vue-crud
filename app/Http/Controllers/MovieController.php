<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies =  Movie::get();

        return Inertia::render('Movie/Index',[
            'movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Movie/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'date' => $request->date,
        ]);

        return redirect()->route('movie')->with('sucess','create sucessful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return Movie::find($movie)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return Inertia::render('Movie/Edit',[
            'movie' => $movie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);
        // $data = Movie::find($movie)->first();
        $data = [
            'title' => $request->title,
            'director' => $request->director,
            'date' => $request->date,
        ];
        $movie->update($data);

        return redirect()->route('movie')->with('sucess','update sucessful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function delete(Movie $movie)
    {
        $movie = Movie::find($movie)->first();
        $movie->delete();
        return redirect()->route('movie')->with('sucess','delete sucessful');
    }
}
