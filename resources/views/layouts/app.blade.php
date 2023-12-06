<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito:400,700&display=swap" />
    <link rel="icon" type="image/png" href="\uploads\3.png" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://kit.fontawesome.com/477e17b079.js" crossorigin="anonymous"></script>
    <title>Literie 3000</title>
</head>
<body class="font-[Nunito] flex flex-col justify-between h-screen text-[#112A46]">

    <nav class="bg-[#abb1a3] flex items-center justify-center space-x-32 py-2 mb-6 text-xl font-bold">
        <div>
            <img src="\uploads\logoNew.png" alt="logo Literie 3000" class="h-20 lg:h-28">
        </div>
        <div class="md:flex md:text-md md:space-x-6 lg:space-x-8 text-amber-50">
            <a href="/" class="hover:underline underline-offset-8">Accueil</a>
            <a href="/catalogue" class="hover:underline underline-offset-8">Références</a>
            <a href="/categories" class="hover:underline underline-offset-8">Catégories</a>
            <a href="/matelassiers" class="hover:underline underline-offset-8">Matelassiers</a>
        </div>
        <div class="text-center text-sm lg:flex lg:items-center space-x-4 font-bold text-amber-50">
            @auth
            {{-- <p>{{Auth::user()->email}}</p> --}}
              <div class="relative">
                <i class="fa-solid fa-user-tie text-3xl" style="color: #ffffff;"></i>
                <p>{{Auth::user()->name}}</p>
                {{-- <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YXZhdGFyfGVufDB8fDB8fHww" alt=""> --}}
                <span class="top-0 left-12 absolute  w-3 h-3 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
            </div>
            <a href="/logout"><i class="fa-solid fa-right-from-bracket text-2xl" style="color: #ffffff;"></i></a>
            @else
              <a href="/login" class="hover:underline underline-offset-8">Connexion</a>
            @endauth
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-3 py-6 w-full">
    
            @yield('content')

    </div>

    <footer class="text-xl text-black font-bold bg-[#7c8479] text-center flex items-center justify-center py-4 space-x-4">

        <img src="\uploads\logoNew.png" alt="logo Literie 3000" class="h-12">
        <p> &copy; {{ date('Y')}}</p>

    </footer>
</body>
</html>