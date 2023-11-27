<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito:400,700&display=swap" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://kit.fontawesome.com/477e17b079.js" crossorigin="anonymous"></script>
    <title>Literie 3000</title>
</head>
<body class="font-[Nunito] flex flex-col justify-between h-screen">

    <nav class="bg-cyan-700 flex justify-between items-center p-8 mb-6">
        <h1 class="text-2xl md:text-4xl text-white font-bold">Literie 3000</h1>
        <div class="text-xs md:flex md:text-md md:space-x-6 lg:space-x-8 font-bold text-amber-50">
            <a href="/" class="hover:underline underline-offset-8">Accueil</a>
            <a href="/catalogue" class="hover:underline underline-offset-8">Notre catalogue</a>
            <a href="/a-propos" class="hover:underline underline-offset-8">A Propos</a>
        </div>
        <div class="text-center text-sm lg:flex lg:items-center space-x-4 font-bold text-amber-50">
            @auth
            <p>{{Auth::user()->email}}</p>
              <div class="relative">
                <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YXZhdGFyfGVufDB8fDB8fHww" alt="">
                <span class="top-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
            </div>
            <a href="/logout"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>
            @else
              <a href="/login">Connexion</a>
            @endauth
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-3 py-6 w-full">
    
            @yield('content')

    </div>

    <footer class="text-4xl text-white font-bold bg-cyan-700 text-center">

        Literie 3000 &copy; {{ date('Y')}}

    </footer>
</body>
</html>