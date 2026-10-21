@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="flex flex-col gap-4">
    <h1 class="mb-4 text-[1.6 rem] font-semibold text-gray-800">Usuarios</h1>
    <p class=mb-0 text-gray-600">Lista de usuarios.</p>
    <div class="flex justify-center p-4">
        {{ $users->links() }}
    </div>
    <table class="w-full text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class= "px-6 py-3">Email</th>    
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class = "px-6 py-4">{{ $user->id }}</td>
                    <td class = "px-6 py-4">{{ $user->name }}</td>
                    <td class = "px-6 py-4">{{ $user->email }}</td>    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
