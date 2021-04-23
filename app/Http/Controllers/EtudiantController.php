<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $etudiants = Etudiant::orderBy('id','DESC')->get();
        
        return view('etudiants.index',compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $classes = Classe::all();

        return view('etudiants.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $profil = $request->file('profil');

        $nomimage = 'etudiant'.time().uniqid().'.'.$profil->getClientOriginalExtension();

        $path = $profil->storeAS('public/profil',$nomimage);

        $request->validate([
            'adresse' => 'required|unique:etudiants'   
        ]);

        $request->validate([
        'phone' => 'required|unique:etudiants'
        ]);
        
        $etudiant = new Etudiant();
        $etudiant->prenom = $request->prenom; 
        $etudiant->nom = $request->nom; 
        $etudiant->phone = $request->phone;
        $etudiant->adresse = $request->adresse; 
        $etudiant->profil = $nomimage; 
        $etudiant->classe_id =$request->classe;

        $etudiant->save();

        return redirect()->route('etudiants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);

        return view('etudiants.show')->with('etudiant',$etudiant); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etudiant = Etudiant::find($id);

         return view('etudiants.edit')->with('etudiant',$etudiant); 
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
        $profil = $request->file('profil');

        $nomimage = 'etudiant'.time().uniqid().'.'.$profil->getClientOriginalExtension();

        $path = $profil->storeAS('public/profil',$nomimage);

        $etudiant = Etudiant::find($id);

        $etudiant->prenom = $request->prenom;
        $etudiant->nom = $request->nom;
        $etudiant->phone = $request->phone;
        $etudiant->adresse = $request->adresse;
        $etudiant->profil = $nomimage;

        $etudiant->save();


        return redirect()->route('etudiants.index')->with('message','etudiant modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);

        $etudiant->delete();


        return redirect()->route('etudiants.index')->with('messagedelete','Etudiant supprimée');
    }
}
