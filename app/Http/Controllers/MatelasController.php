<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Marque;
use App\Models\Matelas;
use App\Models\Dimension;
use App\Models\Stock;
use Illuminate\Http\Request;

class MatelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return view('matelas/index',[
            'matelas'=> Matelas::with('category')->get(),
            //tous les metelas WITH leur catégorie (inner join) et le get = all;
        ]);
    }

    
    
    public function create()
    {
        return view('matelas/create', [
            'categories' => Category::all()->sortBy('name'),
            'marques' => Marque::all()->sortBy('name'),
            'dimensions' => Dimension::all()->sortBy('size'),
            'stocks' => Stock::all()->sortBy('quantity'),           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        //vérif des champs avant insertion
        $request->validate([
            'name' => 'required|min:2',
            'cover' => 'required|url',
            'largeur' => 'required|numeric|min:90|max:200',
            'longueur' => 'required|numeric|min:190|max:200',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:1|max:9999',
            'category' => 'exists:categories,id',
            'marque' =>'exists:marques,id'
        ]);
        //si erreur laravel renvoit le formulaire avec les erreurs sinon on passe au save

        $item = new Matelas();
        $item->name = $request->name;
        $item->cover = $request->cover;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->category_id = $request->category;
        $item->marque_id = $request->marque;
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
            'marques' => Marque::all()->sortBy('name'),   
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
            'name' => 'required|min:2',
            'cover' => 'required|url',
            'largeur' => 'required|numeric|min:90|max:200',
            'longueur' => 'required|numeric|min:190|max:200',
            'price' => 'required|numeric|between:0.01,9999.99',
            'discount' => 'nullable|numeric|min:1|max:9999',
            'category' => 'exists:categories,id',
            'marque' =>'exists:marques,id'
        ]);
        //si erreur laravel renvoit le formulaire avec les erreurs sinon on passe au save

        $item->name = $request->name;
        $item->cover = $request->cover;
        $item->largeur = $request->largeur;
        $item->longueur = $request->longueur;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->category_id = $request->category;
        $item->marque_id = $request->marque;
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
