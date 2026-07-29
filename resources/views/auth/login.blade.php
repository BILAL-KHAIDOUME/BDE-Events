@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6 text-center">Connexion</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-4 bg-white shadow rounded p-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded p-2" required autofocus>
        </div>

        <div>
            <label class="block font-medium mb-1">Mot de passe</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember">Se souvenir de moi</label>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Se connecter
        </button>

        <p class="text-center text-sm text-gray-600">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">S'inscrire</a>
        </p>
    </form>
</div>
@endsection