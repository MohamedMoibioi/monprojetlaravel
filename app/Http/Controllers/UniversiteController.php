<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universite;

class UniversiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universite= Universite::all();
        return view('universites.index')->with('universite',$universite);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('universites.create');

        $universite = Universite::all();

        return view('universites.create');
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
            'libelle' => 'required|unique:universites'
        ]);
            

        $universite = new Universite();

        $universite->libelle = $request->libelle; 
        $universite->description = $request->description;  
        $universite->save();

        return redirect()->route('universites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $universite = Universite::find($id);

        return view('universites.show')->with('universite',$universite);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $universite = Universite::find($id);

        return view('universites.modifier')->with('universite',$universite);
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
        $universite = Universite::find($id);

        $universite->libelle = $request->libelle;
        $universite->description = $request->description;

        $universite->save();


        return redirect()->route('universites.index')->with('message','la modification réussite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $universite = Universite::find($id);

        $universite->delete();


        return redirect()->route('universites.index')->with('messagedelete','Universite a ete bien supprimée');
    }
}
