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
            <input placeholder="Nom du modèle" type="text" name="name" value="{{ old('name') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <input placeholder="media.jpg, .jpeg, .png, .gif" type="file" name="cover" value="{{ old('cover') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <input placeholder="Dimensions : 90 x 190" type="text" name="dimensions" value="{{ old('dimensions') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <input placeholder="Prix" type="number" name="price" min="0"  step="0.01" value="{{ old('price') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <input placeholder="Promotion (optionel)" type="number" name="discount" value="{{ old('discount') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <label for="category">Catégorie :</label>
            <select name="category" id="category" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-1/2">
                @foreach ($categories as $category)
                    <option @selected($category->id == old('category')) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button class="bg-cyan-700 text-white rounded-lg px-4 my-2 py-2 my-6 hover:bg-cyan-500 hover:text-black">Ajouter</button>
        </form>
    </div>

@endsection