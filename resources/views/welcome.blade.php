@extends('layouts/app')

@section('content')
    <div class="flex flex-col items-center space-x-8">
        <h3 class="text-4xl font-bold my-4">Gestion des références {{$name}}</h3>
        <a href="/catalogue/ajout" class="bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]">Ajouter</a>
    </div>
@endsection