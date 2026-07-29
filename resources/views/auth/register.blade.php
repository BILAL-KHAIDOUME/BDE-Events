@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6 text-center">Créer un compte</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-4 bg-white shadow rounded p-6">
        @csrf

        <div>
            <label class="block font-medium mb-1">Nom complet</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required autofocus>
        </div>

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Mot de passe</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="w-full border rounded p-2" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            S'inscrire
        </button>

        <p class="text-center text-sm text-gray-600">
            Déjà inscrit ?
            <a href="" class="text-blue-600 hover:underline">Se connecter</a>
        </p>
    </form>
</div>
@endsection