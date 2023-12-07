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
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'dimensions' => 'required|array',
            // 'dimensions.*' => 'required|exists:dimensions,id',
            'stocks' => 'numeric|min:2|max:10',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:1|max:80',
            'category' => 'exists:categories,id',
            'marque' =>'exists:marques,id'
        ]);
        //si erreur laravel renvoit le formulaire avec les erreurs sinon on passe au save

        $item = new Matelas();
        $item->name = $request->name;
        $item->dimension_id = 1;
        $item->stock_id = $request->stocks;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->available = 1;
        $item->category_id = $request->category;
        $item->marque_id = $request->marque;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = time().'.'.$cover->extension();
            $request->cover->move(public_path('photos'), $coverName);
            $item->cover = $coverName;
        }
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
            'dimensions' => Dimension::all()->sortBy('size'),
            'stocks' => Stock::all()->sortBy('quantity'),    
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
            'name' => 'required|unique:matelas,name,'.$item->id,
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'dimensions' => 'required|array',
            // 'dimensions.*' => 'required|exists:dimensions,id',
            'stocks' => 'numeric|min:2|max:10',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:1|max:80',
            'category' => 'exists:categories,id',
            'marque' =>'exists:marques,id'
        ]);
        //si erreur laravel renvoit le formulaire avec les erreurs sinon on passe au save

        $item->name = $request->name;
        $item->dimension_id = 1;
        $item->stock_id = $request->stocks;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->available = 1;
        $item->category_id = $request->category;
        $item->marque_id = $request->marque;
        
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = time().'.'.$cover->extension();
            $request->cover->move(public_path('photos'), $coverName);
            $item->cover = $coverName;
        }
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
