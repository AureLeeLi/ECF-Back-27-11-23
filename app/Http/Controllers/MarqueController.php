<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Matelas;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('matelassiers/index',[
            'marques'=> Marque::all(),
            ]);
    }

    public function create()
    {
        return view('matelassiers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        //vérif des champs avant insertion
        $request->validate([
            'name' => 'required|min:2',
        ]);
        //si erreur laravel renvoit le formulaire avec les erreurs sinon on passe au save

        $marque = new Marque();
        $marque->name = $request->name;
        $marque->save();
       
        return redirect('/matelassiers');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $marque = Marque::findOrFail($id); 

        return view('matelassiers/about', [
            'marque'=> $marque,
            'matelas' => Matelas::all()->whereIn('marque_id', $marque->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Marque::destroy($id);
       
        return redirect('/matelassiers');
    }
}
