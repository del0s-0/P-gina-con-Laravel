@extends('layouts.app')

@section('title', 'Agregar usuario')

@section('content')
    <h1 class="mb-1 text-[1.6rem] font-semibold text-gray-800">Agregar usuario</h1>
    <p class="mb-4 text-gray-600">Crea una cuenta nueva.</p>

    <form method="POST" action="{{ route('users.store') }}" class="text-left">
        @csrf

        <p class="mb-[0.9rem]">
            <label for="name" class="mb-[0.3rem] block text-[0.9rem] font-semibold text-gray-700">Nombre</label>
            <input
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
                class="w-full rounded-lg border border-gray-300 px-[0.7rem] py-[0.55rem] font-sans focus:border-blue-600 focus:outline focus:outline-2 focus:outline-offset-1 focus:outline-blue-600"
            >
            @error('name')
                <span class="mt-1 block text-[0.85rem] text-red-700">{{ $message }}</span>
            @enderror
        </p>

        <p class="mb-[0.9rem]">
            <label for="email" class="mb-[0.3rem] block text-[0.9rem] font-semibold text-gray-700">Email</label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                required
                class="w-full rounded-lg border border-gray-300 px-[0.7rem] py-[0.55rem] font-sans focus:border-blue-600 focus:outline focus:outline-2 focus:outline-offset-1 focus:outline-blue-600"
            >
            @error('email')
                <span class="mt-1 block text-[0.85rem] text-red-700">{{ $message }}</span>
            @enderror
        </p>

        <p class="mb-[0.9rem]">
            <label for="password" class="mb-[0.3rem] block text-[0.9rem] font-semibold text-gray-700">Password</label>
            <input
                id="password"
                name="password"
                type="password"
                required
                class="w-full rounded-lg border border-gray-300 px-[0.7rem] py-[0.55rem] font-sans focus:border-blue-600 focus:outline focus:outline-2 focus:outline-offset-1 focus:outline-blue-600"
            >
            @error('password')
                <span class="mt-1 block text-[0.85rem] text-red-700">{{ $message }}</span>
            @enderror
        </p>

        <p class="mb-[0.9rem]">
            <label for="password_confirmation" class="mb-[0.3rem] block text-[0.9rem] font-semibold text-gray-700">Confirmar password</label>
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                required
                class="w-full rounded-lg border border-gray-300 px-[0.7rem] py-[0.55rem] font-sans focus:border-blue-600 focus:outline focus:outline-2 focus:outline-offset-1 focus:outline-blue-600"
            >
        </p>

        <button
            type="submit"
            class="mt-[0.4rem] w-full cursor-pointer rounded-lg border-0 bg-blue-600 px-4 py-[0.65rem] font-semibold text-white hover:bg-blue-700"
        >
            Guardar usuario
        </button>

        <a
            href="{{ route('users') }}"
            class="mt-3 block text-center text-[0.9rem] font-semibold text-gray-600 no-underline hover:text-gray-900"
        >
            Volver a la lista
        </a>
    </form>
@endsection
