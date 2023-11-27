@extends('layouts/app')

@section('content')
    <div class="flex items-center space-x-8">
        <h3 class="text-4xl font-bold my-4">Gestion {{$name}}</h3>
        <a href="/catalogue/ajout" class="bg-cyan-700 text-white rounded-lg px-4 py-2 my-6 hover:bg-cyan-500 hover:text-black">Ajouter une référence</a>
    </div>
@endsection