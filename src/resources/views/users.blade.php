@extends('layouts.app')

@section('title', 'Usuarios')

@section('card_width', 'max-w-5xl')

@section('before_card')
    <div class="flex w-full max-w-5xl flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <form method="GET" action="{{ route('users') }}" class="flex w-full gap-2 sm:max-w-md">
            <label for="search" class="sr-only">Buscar usuarios</label>
            <input
                id="search"
                name="search"
                type="search"
                value="{{ $search }}"
                placeholder="Buscar por nombre o email..."
                class="w-full rounded-lg border border-gray-300 bg-white px-[0.7rem] py-[0.55rem] font-sans text-gray-800 focus:border-blue-600 focus:outline focus:outline-2 focus:outline-offset-1 focus:outline-blue-600"
            >
            <button
                type="submit"
                class="shrink-0 cursor-pointer rounded-lg border-0 bg-gray-900 px-4 py-[0.55rem] font-semibold text-white hover:bg-gray-800"
            >
                Buscar
            </button>
            @if ($search !== '')
                <a
                    href="{{ route('users') }}"
                    class="shrink-0 rounded-lg border border-gray-300 bg-white px-4 py-[0.55rem] font-semibold text-gray-700 no-underline hover:bg-gray-50"
                >
                    Limpiar
                </a>
            @endif
        </form>

        <a
            href="{{ route('users.create') }}"
            class="inline-block shrink-0 rounded-lg bg-blue-600 px-4 py-[0.6rem] text-center font-semibold text-white no-underline hover:bg-blue-700"
        >
            + Agregar usuario
        </a>
    </div>
@endsection

@section('content')
    <div class="text-left">
        <h1 class="mb-1 text-[1.6rem] font-semibold text-gray-800">Usuarios</h1>
        <p class="mb-4 text-gray-600">
            @if ($search !== '')
                Resultados para «{{ $search }}» ({{ $users->total() }}).
            @else
                Lista de usuarios ({{ $users->total() }}).
            @endif
        </p>

        @if (session('status'))
            <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-[0.9rem] text-green-800">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-[0.9rem] text-red-800">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-left text-gray-500">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr class="bg-white hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $user->name }}</td>
                            <td class="break-all px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-right">
                                @if ($user->is(auth()->user()))
                                    <button
                                        type="button"
                                        disabled
                                        title="No puedes eliminar tu propio usuario"
                                        class="cursor-not-allowed rounded-lg border border-gray-200 bg-gray-100 px-3 py-1.5 text-[0.85rem] font-semibold text-gray-400"
                                    >
                                        Eliminar
                                    </button>
                                @else
                                    <form
                                        method="POST"
                                        action="{{ route('users.destroy', $user) }}"
                                        onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="cursor-pointer rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-[0.85rem] font-semibold text-red-700 hover:bg-red-100"
                                        >
                                            Eliminar
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                No se encontraron usuarios.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection
