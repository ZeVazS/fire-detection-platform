@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <p>Bem-vindo {{ auth()->user()->name }}!</p>
    <table class="min-w-full bg-white shadow rounded mt-6">
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

@endsection
