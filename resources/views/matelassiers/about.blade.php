@extends('layouts/app')

@section('content')
<div class="flex my-4">
    <a href="/matelassiers" class="text-[#7c8479] hover:underline underline-offset-8">Retour</a>
    <div class="w-full mx-auto flex justify-center">
        <span class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-[#7c8479] relative inline-block py-2 px-4">
        <span class="relative text-white text-3xl">{{ $marque->name }}</span>
        </span>
    </div>
    <a href="/matelassiers/{{$marque->id}}/supprimer" class="bg-[#7c8479] text-xs text-center text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]" onclick='return confirm("Es-tu sûr de vouloir supprimer le fournissuer {{$marque->name}} ?")'><i class="fa-solid fa-trash pr-2" style="color: #070707;"></i>Supprimer le fabricant {{$marque->name}}</a>
</div>

<div class="flex flex-wrap mx-auto justify-center">
    @foreach ($matelas as $item)
    <div class="w-1/2 md:w-1/3 lg:w-1/3 my-4">
        <div class="flex flex-col justify-between h-full">
        <a href="/" class="group flex flex-col">
                <img class="w-4/5 mb-2 h-[300px] object-cover rounded-lg group-hover:scale-105" src="{{ $item->cover }}" alt="{{ $item->name }}">
                <h3 class="text-xl font-bold w-4/5 underline group-hover:no-underline text-sm text-gray-600 my-4">{{ $item->name }}</h3>

                <p class="text-sm w-4/5 mb-2">
                    <i class="fa-solid fa-ruler-combined pr-2" style="color: #000000;"></i> Dimensions : {{ $item->dimensions->size }}
                </p>
                <p class="text-sm w-4/5 mb-2">
                    <i class="fa-solid fa-tag pr-2" style="color: #000000;"></i> Prix : {{$item->price}} € | Promotion : {{$item->discount}} €
                </p>
                @if ($item->discount) 
                <p class="text-sm w-4/5 mb-2">
                    <i class="fa-solid fa-percent pr-2" style="color: #000000;"></i>Prix remisé  : 
                    - {{$item->discount($item->price)}} % %
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
                <h6 class="text-sm w-4/5 mb-2">
                    En Stock :  @if ($item->stock_id)
                    @if (($item->stocks->quantity) < 2)
                        <p class="text-red">{{ $item->stocks->quantity }}</p>   
                    @else
                        <p> {{ $item->stocks->quantity }} </p>  
                    @endif
                     @endif
                </h6>
            </a>
            @if (Auth::user() && Auth::user()->id == $item->user_id)
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