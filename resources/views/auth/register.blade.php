@extends('layouts/app')

@section('content')

    <form action="" method="post" class="w-4/5 flex flex-col mx-auto justifay-center">
        @csrf
        <input placeholder="Votre Prénom" type="text" name="name" value="{{ old('name')}}" class="rounded-lg w-1/2 my-6 mx-auto">
        <input placeholder="Email" type="text" name="email" value="{{ old('email')}}" class="rounded-lg w-1/2 my-6 mx-auto">
        @error('email')
             <p>{{ $message }}</p>
        @enderror

        <input placeholder="Mot de passe" type="password" id="password" name="password" required autocomplete="new-password" class="rounded-lg w-1/2 my-6 mx-auto">
        <input placeholder="Confirmation du Mot de passe" type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="rounded-lg w-1/2 my-6 mx-auto">
        @error('password')
             <p>{{ $message }}</p>
        @enderror

        <button class="w-1/2 mx-auto bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]">Enregistrer</button>
    </form>

@endsection