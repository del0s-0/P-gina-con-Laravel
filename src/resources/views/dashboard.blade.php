@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4 text-[1.6rem] font-semibold text-gray-800">Zona privada</h1>
    <p class="mb-0 text-gray-600">Bienvenido, {{ auth()->user()->name }}.</p>
@endsection
