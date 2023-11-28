<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Matelas;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories/index',[
        'categories'=> Category::all(),
        ]);
        
    }

    public function create()
    {
        return view('categories/create');
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

        $category = new Category();
        $category->name = $request->name;
        $category->save();
       
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id); // Select * from categories where id = :id OU 404

        return view('categories/about-category', [
            'category'=> $category,
            'matelas' => Matelas::all()->whereIn('category_id', $category->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::destroy($id);
       
        return redirect('/categories');

    }
}
