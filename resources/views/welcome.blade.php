@extends('layouts/app')

@section('content')
    <div class="flex flex-col items-center space-x-8">
        <h3 class="text-3xl font-bold my-4">Ajouter :</h3>
        <a href="/catalogue/ajout" class="w-1/3 bg-[#7c8479] text-white text-center rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]"><i class="fa-solid fa-sitemap pr-2" style="color: #000000;"></i> une référence</a>
        <a href="/categories/ajout" class="w-1/3 bg-[#7c8479] text-white text-center rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]"><i class="fa-solid fa-bed pr-2" style="color: #000000;"></i> une catégorie</a>
        <a href="/matelassiers/ajout" class="w-1/3 bg-[#7c8479] text-white text-center rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]"><i class="fa-solid fa-industry pr-2" style="color: #000000;"></i> un fabricant</a>
    </div>
@endsection