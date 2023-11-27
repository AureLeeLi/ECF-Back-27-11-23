@extends('layouts/app')

@section('content')
    <div class="flex items-center justify-between">
        <h3 class="text-4xl font-bold my-4">Notre Catalogue</h3>
        <a href="/catalogue/ajout" class="bg-cyan-700 text-white rounded-lg px-4 py-2 my-6 hover:bg-cyan-500 hover:text-black"><i class="fa-solid fa-plus pr-2" style="color: #ffffff;"></i> Ajouter une référence</a>
    </div>
    <div class="flex flex-wrap mx-auto">
        @foreach ($matelas as $item)
        <div class="w-1/2 md:w-1/3 lg:w-1/3 my-4">
            <div class="flex flex-col justify-between h-full">
            <a href="/film/{{ $item->id }}" class="group flex flex-col">
                    <img class="w-4/5 mb-2 h-[300px] object-cover rounded-lg group-hover:scale-105" src="{{ $item->cover }}" alt="{{ $item->name }}">
                    <h3 class="text-xl font-bold w-4/5 underline group-hover:no-underline text-sm text-gray-600 my-4">{{ $item->name }}</h3>

                    <p class="text-sm w-4/5 mb-2">
                        <i class="fa-solid fa-ruler-combined pr-2" style="color: #000000;"></i> Dimensions : {{$item->dimensions}}
                    </p>
                    <p class="text-sm w-4/5 mb-2">
                        <i class="fa-solid fa-tag pr-2" style="color: #000000;"></i> Prix : {{$item->price}}€ | <i class="fa-solid fa-percent px-2" style="color: #000000;"></i> Promotion : {{$item->discount}} €
                    </p>
                    <p class="text-sm w-4/5 mb-2">
                        Prix remisé  : @if ($item->discount) 
                        {{($item->price = $item->price-$item->discount)}} € (- {{($item->discount/$item->price)*100}} %)
                        @endif
                    </p>
                    <p class="text-sm w-4/5 mb-2">
                        <i class="fa-solid fa-bed pr-2" style="color: #000000;"></i> Catégorie :  @if ($item->category_id)
                        {{ $item->category->name }}
                        {{-- methode catégorie dans le modele Matelas et propriétés de l'objet catégory (id, name....)--}}
                        @endif
                    </p>
                    {{-- <p class="text-sm w-4/5 mb-2">
                        <i class="fa-regular fa-copyright pr-2" style="color: #000000;"></i> Marque(s) :  @if ($item->category_id)
                        {{ $item->category->name }}
                        {{-- methode catégorie dans le modele Matelas et propriétés de l'objet catégory (id, name....)--}}
                        {{-- @endif
                    </p> --}}
                </a>
                {{-- @if (Auth::user() && Auth::user()->id == $movie->user_id) --}}
                {{-- on affiche modifier supprimer si on est connecté et qu'on a le film --}}
                <div class="flex text-center text-xs space-x-2">
                    <a href="/catalogue/{{$item->id}}/modifier" class="bg-cyan-700 text-white rounded-lg px-2 py-2 my-4 hover:bg-cyan-500 hover:text-black">Modifier</a>
                    <a href="/catalogue/{{$item->id}}/supprimer" class="bg-cyan-800 text-white rounded-lg px-2 py-2 my-4 hover:bg-cyan-600 hover:text-black" onclick='return confirm("Es-tu sûr de vouloir supprimer la référence {{$item->name}} ?")'>Supprimer</a>
                    {{-- on click = pop confirmation de suppression --}}
                </div>
                {{-- @endif --}}
            </div>
        </div>
            @endforeach
    </div>
@endsection