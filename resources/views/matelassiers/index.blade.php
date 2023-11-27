@extends('layouts/app')

@section('content')
    <div class="flex items-center justify-center space-x-12">
        <h3 class="text-4xl font-bold my-8">Nos Matelassiers</h3>
        <a href="/matelassiers/ajout" class="bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]"><i class="fa-solid fa-plus pr-2" style="color: #ffffff;"></i>Ajouter</a>
    </div>
    <div class="grid grid-cols-3 gap-6 my-8">
        @foreach ($marques as $marque)
            <div class="border p-4 rounded shadow hover:bg-[#7c8479] hover:text-white">
            <a href="/matelassiers/{{ $marque->id }}"><h2>{{ $marque->name }}</h2></a>
            </div>
        @endforeach
    </div>
@endsection