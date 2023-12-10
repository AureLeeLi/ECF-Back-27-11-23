@extends('layouts/app')

@section('content')
    <div class="flex items-center justify-center space-x-12">
        <h3 class="text-4xl font-bold my-8">Notre Catalogue Complet <p class="text-sm text-center">(Total Ref: {{count($matelas)}})</p></h3>
        <a href="/catalogue/ajout" class="bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]"><i class="fa-solid fa-plus pr-2" style="color: #ffffff;"></i>Ajouter</a>
    </div>
    <div class="flex flex-wrap mx-auto justify-center">
        @foreach ($matelas as $item)
        <div class="w-1/2 md:w-1/3 lg:w-1/3 my-4">
            <div class="flex flex-col justify-between h-full {{ $item->stock->quantity < 5 ? 'text-red-500 font-bold' : '' }}">
            <a href="" class="group flex flex-col">
                    <img class="w-4/5 mb-2 h-[300px] object-cover rounded-lg group-hover:scale-105" src="{{ $item->cover }}" alt="{{ $item->name }}">
                    {{-- chemin cover avec upload src="{{ asset('photos/' . $item->cover) }}" --}}
                    <h3 class="text-xl font-bold w-4/5 underline group-hover:no-underline text-sm text-gray-600 my-4">{{ $item->name }}</h3>

                    <p class="text-sm w-4/5 mb-2">
                        <i class="fa-solid fa-ruler-combined pr-2" style="color: #000000;"></i> Dimensions : {{ $item->dimensions->size }}
                        {{-- methode dimensions dans le modele Matelas et propriétés de l'objet dimension (size)--}}
                    </p>
                    <p class="text-sm w-4/5 mb-2">
                        <i class="fa-solid fa-tag pr-2" style="color: #000000;"></i> Prix : {{$item->price}} € | Promotion : {{$item->discount}} €
                    </p>
                    @if ($item->discount) 
                    <p class="text-sm w-4/5 mb-2">
                        <i class="fa-solid fa-percent pr-2" style="color: #000000;"></i> Remise : 
                       - {{$item->discount($item->price)}} %
                        </p>
                    @endif
                    <p class="text-sm w-4/5 mb-2">
                        <i class="fa-solid fa-bed pr-2" style="color: #000000;"></i> Catégorie :  @if ($item->category_id)
                        {{ $item->category?->name }}
                        {{-- methode catégorie dans le modele Matelas et propriétés de l'objet catégory (id, name....)--}}
                        @endif
                    </p>
                    <p class="text-sm w-4/5 mb-2">
                        <i class="fa-regular fa-copyright pr-2" style="color: #000000;"></i> Marque :  @if ($item->marque_id)
                        {{ $item->marques?->name }}
                        {{-- methode marques dans le modele Matelas et propriétés de l'objet marques (id, name....)--}}
                         @endif
                    </p>
                    <h6 class="text-sm w-4/5 mb-2 {{ $item->stock->quantity < 5 ? 'text-xl font-bold' : '' }}">
                        En Stock :  @if ($item->stock)
                            <p> {{ $item->stock->quantity }} </p>  
                        @endif
                    </h6>
                </a>
                @if (Auth::user() && Auth::user()->id == $item->user_id)
                {{-- on affiche modifier supprimer si on est connecté et qu'on peut gérer le produit --}}
                <div class="flex text-center space-x-2">
                    <a href="/catalogue/{{$item->id}}/modifier" class="bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]"><i class="fa-regular fa-pen-to-square" style="color: #070707;"></i></a>
                    <a href="/catalogue/{{$item->id}}/supprimer" class="bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]" onclick='return confirm("Es-tu sûr de vouloir supprimer la référence {{$item->name}} ?")'><i class="fa-solid fa-trash" style="color: #070707;"></i></a>
                    {{-- on click = pop confirmation de suppression --}}
                </div>
                @endif
            </div>
        </div>
            @endforeach
    </div>
@endsection