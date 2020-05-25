<?php

namespace App\Http\Controllers;

use App\Flower;
use App\Month;
use App\Bee;
use App\Http\Resources\FlowerResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = Month::all();
        $bees = Bee::all();
        $flowers = new FlowerResourceCollection(Flower::all());
        return view('home', compact('flowers', 'bees', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $months = Month::all();
        $bees = Bee::all();
        return view('register_flower', compact('months', 'bees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|unique:flowers',
            'species'       => 'required|string',
            'description'   => 'required|string',
            'file'          => 'required|file|image',
            'bees'          => 'required|array',
            'months'        => 'required|array'
        ], $this->error_messages);

        if ($validator->fails())
            return back()->withErrors($validator)->withInput();

        $data = $request->all();

        $image_name = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public', $image_name);

        $path = 'storage/' . $image_name;

        $flower = Flower::Create([
            'name' => $data['name'],
            'species'   => $data['species'],
            'description' => $data['description'],
            'image' => $path
        ]);

        $flower->bees()->attach($data['bees']);
        $flower->months()->attach($data['months']);

        return redirect('/')->with('success', 'Flor adicionada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function show(Flower $flower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function edit(Flower $flower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flower $flower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flower $flower)
    {
        //
    }
}
