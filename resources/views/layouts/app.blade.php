<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BDE Events')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <nav class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="" class="text-xl font-bold text-blue-600">BDE Events</a>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('events.index') }}" class="text-gray-700 hover:text-blue-600">Événements</a>
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.events.create') }}" class="text-gray-700 hover:text-blue-600">Créer un
                            événement</a>
                    @endif

                    <span class="text-gray-600">{{ auth()->user()->name }}</span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Connexion</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">S'inscrire</a>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>

</html>
