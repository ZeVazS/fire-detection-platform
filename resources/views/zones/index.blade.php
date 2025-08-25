@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-white">Zonas</h1>

    <a href="{{ route('zones.create') }}" class="text-white btn btn-primary mb-3">Nova Zona</a>

    @foreach($zones as $zone)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="text-white">{{ $zone->nome }} ({{ ucfirst($zone->risco) }})</h5>
                <p class="text-white">GPS: {{ $zone->gps }}</p>
                <a href="{{ route('zones.show', $zone) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('zones.edit', $zone) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('zones.destroy', $zone) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="text-white btn btn-sm btn-danger">Apagar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
