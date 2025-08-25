@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $zone->nome }}</h1>
    <p>GPS: {{ $zone->gps }}</p>
    <p>Risco: {{ ucfirst($zone->risco) }}</p>

    <h3>Câmaras</h3>
    <a href="{{ route('zones.cameras.create', $zone) }}" class="btn btn-primary mb-3">Adicionar Câmara</a>

    @foreach($zone->cameras as $camera)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $camera->nome }}</h5>
                <a href="{{ $camera->url }}" target="_blank">Ver feed</a>
                <a href="{{ route('zones.cameras.edit', [$zone, $camera]) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('zones.cameras.destroy', [$zone, $camera]) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Apagar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
