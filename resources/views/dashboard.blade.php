@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-white text-2xl font-bold">Dashboard</h1>
    <p class="text-white">Bem-vindo {{ auth()->user()->name }}!</p>

    {{-- Users Table --}}
    <h2 class="text-lg font-semibold text-white mt-6 mb-2">Utilizadores</h2>
    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Gestão de Zonas e Câmaras --}}
    <h2 class="text-lg font-semibold text-white mt-8 mb-4">Gestão de Monitorização</h2>
    <div class="flex gap-4">
        <a href="{{ route('zones.index') }}" 
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
           📍 Ver Zonas
        </a>

        <a href="{{ route('zones.create') }}" 
           class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded shadow">
           ➕ Criar Zona
        </a>
    </div>

    {{-- Exibir as Zonas com câmaras --}}
    @if(isset($zones) && $zones->count())
        <div class="mt-6 bg-white rounded shadow p-4">
            <h3 class="font-bold text-lg mb-2">Zonas e Câmaras</h3>
            @foreach($zones as $zone)
                <div class="mb-4 border-b pb-2">
                    <p class="font-semibold">{{ $zone->nome }} 
                        <span class="text-sm text-gray-500">({{ $zone->risco }})</span>
                    </p>
                    <p class="text-sm text-gray-600">📍 GPS: {{ $zone->gps }}</p>

                    <div class="mt-2 flex gap-2">
                        <a href="{{ route('zones.edit', $zone) }}" 
                           class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded">
                           ✏️ Editar
                        </a>
                        <form action="{{ route('zones.destroy', $zone) }}" method="POST" onsubmit="return confirm('Eliminar esta zona?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                                🗑️ Eliminar
                            </button>
                        </form>
                        <a href="{{ route('zones.cameras.index', $zone) }}" 
                           class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded">
                           🎥 Ver Câmaras
                        </a>
                        <a href="{{ route('zones.cameras.create', $zone) }}" 
                           class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-sm rounded">
                           ➕ Adicionar Câmara
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
