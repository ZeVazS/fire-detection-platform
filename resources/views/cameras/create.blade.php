@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Câmara a {{ $zone->nome }}</h1>

    <form method="POST" action="{{ route('zones.cameras.store', $zone) }}">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>URL do Feed</label>
            <input type="url" name="url" class="form-control" required>
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
