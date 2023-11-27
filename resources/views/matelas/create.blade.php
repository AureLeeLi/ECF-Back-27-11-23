@extends('layouts/app')

@section('content')


    <a href="/catalogue">Retour au Catalogue</a>
    <h3 class="text-2xl font-bold my-4">Ajout de la nouvelle référence :</h3>
    
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach

    <div class="flex">
        <form action="" method="post" class="w-50" enctype="multipart/form-data">
            @csrf
            <label for="name">Nom du modèle :</label>
            <input type="text" name="name" value="{{ old('name') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <label for="cover">Image :</label>
            <input placeholder="media.jpg, .jpeg, .png, .gif link (url)" type="text" name="cover" value="{{ old('cover') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <div class="w-full flex items-center justify-center space-x-4">
                <label for="largeur">Largeur :</label>
                <input type="number" name="largeur" value="{{ old('largeur') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50]  w-[35%]">
                <label for="longueur">Longueur :</label>
                <input  type="number" name="longueur" value="{{ old('longueur') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-[35%]">
            </div>
            <label for="price">Prix :</label>
            <input placeholder="Prix 00.00" type="number" name="price" min="0"  step="0.01" value="{{ old('price') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <label for="discount">Promotion(optionnelle) :</label>
            <input  type="number" name="discount" value="{{ old('discount') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <label for="category">Catégorie :</label>
            <select name="category" id="category" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
                @foreach ($categories as $category)
                    <option @selected($category->id == old('category')) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <label for="marque">Marque :</label>
            <select name="marque" id="marque" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
                @foreach ($marques as $marque)
                    <option @selected($marque->id == old('marque')) value="{{ $marque->id }}">{{ $marque->name }}</option>
                @endforeach
            </select>

            <button class="bg-cyan-700 text-white rounded-lg px-4 my-2 py-2 my-6 hover:bg-cyan-500 hover:text-black">Ajouter</button>
        </form>
    </div>

@endsection