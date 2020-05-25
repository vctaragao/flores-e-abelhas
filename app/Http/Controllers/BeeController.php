<?php

namespace App\Http\Controllers;

use App\Bee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register_bee');
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
            'name'          => 'required|string|unique:bees',
            'species'       => 'required|string',
        ], $this->error_messages);

        if ($validator->fails())
            return back()->withErrors($validator)->withInput();

        $data = $request->all();

        Bee::Create([
            'name'      => $data['name'],
            'species'   => $data['species']
        ]);

        return redirect('/')->with('success', 'Abelha adicionada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bee  $bees
     * @return \Illuminate\Http\Response
     */
    public function show(Bee $bee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bee  $bees
     * @return \Illuminate\Http\Response
     */
    public function edit(Bee $bees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bee  $bees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bee $bee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bee  $bees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bee $bee)
    {
        //
    }
}
