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
            <input type="file" name="cover" id="cover" value="{{ old('cover') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <div class="w-full flex items-center space-x-4">
                <label for="dimensions">Dimensions :</label>
                {{-- @foreach ($dimensions as $dimension)
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="dimensions[]" id="dimension-{{ $dimension->id }}" value="{{ $dimension->id }}" @checked(in_array($dimension->id, old('dimensions', []))) class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50]">
                        <label for="dimension-{{ $dimension->id }}">{{ $dimension->size }}</label>
                    </div>
                @endforeach --}}
                @foreach($dimensions as $dimension)
                    <input type="radio" id="dimension{{ $dimension->id }}" name="dimension_id" value="{{ $dimension->id }}">
                    <label for="dimension{{ $dimension->id }}">{{ $dimension->size }}</label>
                @endforeach
            </div>
            <div>
                <div>
                    <label for="stock_quantity">Quantité de stock :</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
                </div>
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

            <button class="bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]">Ajouter</button>
        </form>
    </div>

@endsection