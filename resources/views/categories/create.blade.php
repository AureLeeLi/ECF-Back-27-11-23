@extends('layouts/app')

@section('content')


    <a href="/catégories">Retour</a>
    <h3 class="text-2xl font-bold my-4">Ajout de la nouvelle catégorie :</h3>
    
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach

    <div class="flex">
        <form action="" method="post" class="w-50" enctype="multipart/form-data">
            @csrf
            <label for="name">Nom de la Catégorie :</label>
            <input placeholder="ex : Matelas Confort" type="text" name="name" value="{{ old('name') }}" class="my-2 py-2 px-2 border-2 rounded-lg border-[bg-slate-50] w-full">
            <button class="bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]">Ajouter</button>
        </form>
    </div>

@endsection