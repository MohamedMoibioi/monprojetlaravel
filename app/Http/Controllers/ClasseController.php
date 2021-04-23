<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Universite;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::orderBy('id','DESC')->get();
        
        return view('classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universites = Universite::all();

        return view('classes.create',compact('universites'));
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
            'nom' => 'required|unique:classes'
        ]);

        $classe = new Classe();

        $classe->nom = $request->nom;
        $classe->description = $request->description;
        $classe->universite_id = $request->universite;
        $classe->save();

        return redirect()->route('classes.index')->with('message','classe enregistrée');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = Classe::find($id);

        return view('classes.show')->with('classe',$classe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $classe = Classe::find($id);

         return view('classes.edit')->with('classe',$classe);
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
        $classe = Classe::find($id);

        $classe->nom = $request->nom;
        $classe->description = $request->description;
        $classe->save();


        return redirect()->route('classes.index')->with('message','la classe modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::find($id);

        $classe->delete();


        return redirect()->route('classes.index')->with('messagedelete','Classe supprimée');
    }
}
