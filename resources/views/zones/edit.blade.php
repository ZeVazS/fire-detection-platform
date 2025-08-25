@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Zona</h1>

    <form method="POST" action="{{ route('zones.update', $zone) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $zone->nome }}" required>
        </div>
        <div class="mb-3">
            <label>GPS</label>
            <input type="text" name="gps" class="form-control" value="{{ $zone->gps }}" required>
        </div>
        <div class="mb-3">
            <label>Risco</label>
            <select name="risco" class="form-control" required>
                <option value="baixo" {{ $zone->risco == 'baixo' ? 'selected' : '' }}>Baixo</option>
                <option value="médio" {{ $zone->risco == 'médio' ? 'selected' : '' }}>Médio</option>
                <option value="alto" {{ $zone->risco == 'alto' ? 'selected' : '' }}>Alto</option>
            </select>
        </div>
        <button class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection
