@extends('layouts/app')

@section('content')

    <form action="" method="post" class="w-4/5 flex flex-col mx-auto justifay-center">
        @csrf
        <input placeholder="Email" type="text" name="email" value="{{ old('email')}}" class="rounded-lg w-1/2 my-6 mx-auto">
        @error('email')
             <p>{{ $message }}</p>
        @enderror

        <input placeholder="Mot de passe" type="password" name="password" class="rounded-lg w-1/2 my-6 mx-auto">
        @error('password')
             <p>{{ $message }}</p>
        @enderror

        <button class="w-1/2 mx-auto bg-[#7c8479] text-white rounded-lg px-6 py-2 my-4 hover:bg-white hover:text-[#7c8479]">Connexion</button>
    </form>

@endsection