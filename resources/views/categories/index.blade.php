@extends('layouts/app')

@section('content')
    <div class="flex items-center justify-center space-x-12">
        <h3 class="text-4xl font-bold my-8">Nos Catégories</h3>
        <a href="/categories/ajout" class="bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]"><i class="fa-solid fa-plus pr-2" style="color: #ffffff;"></i>Ajouter</a>
    </div>
    <div class="grid grid-cols-3 gap-6 my-8">
        @foreach ($categories as $category)
            <div class="border p-4 rounded shadow hover:bg-[#7c8479] hover:text-white"">
            <a href="/categories/{{ $category->id }}" class="flex justify-around"><h2>{{ $category->name }}</h2><p>{{count($category->matelas)}}</p></a>
            </div>
        @endforeach
    </div>
@endsection