@extends('layouts.app')

@section('title', 'Inicio', 'Configuración')

@section('content')
    <h1 class="mb-4 text-[1.6rem] font-semibold text-gray-800">Homepage</h1>

    @auth
        <p class="mb-[0.85rem] text-gray-600">Hola, {{ auth()->user()->name }}.</p>
        <p class="mb-0 text-gray-600">
            <a href="{{ route('dashboard') }}" class="font-medium text-blue-600 underline hover:text-blue-700">
                Ir al dashboard
            </a>
        </p>
    @else
        <p class="mb-0 text-gray-600">Entra o crea una cuenta para continuar.</p>
    @endauth
@endsection
