<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Matelas;
use Illuminate\Http\Request;

class MatelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //méthode qui permet de retourner toutes les matelas de la base => SELECT * FROM matelas
          return view('matelas/index',[
            'matelas'=> Matelas::with('category', 'dimension')->get(),
            //tous les metelas WITH leur catégorie (inner join) et le get = all;
            //optimiser le code et le nombre de requêtes
        ]);
    }

  
    
    public function create()
    {
        return view('matelas/create', [
            'categories' => Category::all()->sortBy('name'),
            //utilisation des catégories dans le select input
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        //vérif des champs avant insertion
        $request->validate([
            //Obligatoire, unique avec 2 caractères minimum
            'name' => 'required|min:2',
            'dimensions' => 'required',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:1|max:100',
            'released_at' => 'date',
            //catégorie existe
            'category' => 'exists:categories,id',
        ]);
        //si erreur laravel renvoit le formulaire avec les erreurs sinon on passe au save

        $item = new Matelas();
        $item->name = $request->name;
        $item->cover = fake()->imageUrl();
        $item->dimensions = $request->dimensions;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->category_id = $request->category;
        $item->save();
       
        return redirect('/catalogue');
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function edit($id)
    {
        $item = Matelas::findOrFail($id);
      
        return view('matelas/edit', [
            'categories' => Category::all()->sortBy('name'),
            'item' => $item,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, $id)
    {
    
        $item = Matelas::findOrFail($id);
        
        //vérif des champs avant insertion
        $request->validate([
            //Obligatoire, unique avec 2 caractères minimum
            'name' => 'required|min:2',
            'dimensions' => 'required',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:1|max:100',
            'released_at' => 'date',
            //catégorie existe
            'category' => 'exists:categories,id',
        ]);
        //si erreur laravel renvoit le formulaire avec les erreurs sinon on passe au save

        $item->name = $request->name;
        // $item->cover = fake()->imageUrl();
        $item->dimensions = $request->dimensions;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->category_id = $request->category;
        $item->save();
       
        return redirect('/catalogue');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Matelas::destroy($id);
       
        return redirect('/catalogue');

    }
}
