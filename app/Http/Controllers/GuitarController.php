<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;

class GuitarController extends Controller
{

    private static function getData() {
        return [
            ['id' => 1, 'name' => 'American Standard Strat', 'brand' => 'Fender'],
            ['id' => 2, 'name' => 'Starla S2', 'brand' => 'PRS'],
            ['id' => 3, 'name' => 'Explorer', 'brand' => 'Gibson'],
            ['id' => 4, 'name' => 'Talman', 'brand' => 'Ibanez'],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        return view('guitars.index', [
            'guitars' => Guitar::all(),
            'userInput' => '<script>alert(1)</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([ //user input validation
            'guitar-name' => 'required', //is required
            'brand' => 'required', //is required
            'year' => ['required', 'integer'] //is required and must be in integer
        ]);
        //POST
        $guitar = new Guitar();
        
        $guitar->name = $request->input('guitar-name');
        $guitar->brand = $request->input('brand');
        $guitar->year_made = $request->input('year');

        $guitar->save();

        return redirect()->route('guitars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($guitar)
    {
        //GET
        return view('guitars.show', [
            'guitar' => Guitar::findOrFail($guitar)//find and return the data from db
            //it will return 404 if the id is not existed
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($guitar)
    {
        //GET

        return view('guitars.edit', [
            'guitar' => Guitar::findOrFail($guitar)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guitar)
    {
        //POST

        $request->validate([
            'guitar-name' => 'required',
            'brand' => 'required',
            'year' => ['required', 'integer']
        ]);
        //POST
        $record = Guitar::findOrFail($guitar); //check and find the id and return the data
        
        $record->name = $request->input('guitar-name');
        $record->brand = $request->input('brand');
        $record->year_made = $request->input('year');

        $record->save(); //submit to the database

        return redirect()->route('guitars.show', $guitar); //provide the id
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE
    }
}
