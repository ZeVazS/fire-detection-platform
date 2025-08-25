@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Câmara</h1>

    <form method="POST" action="{{ route('zones.cameras.update', [$zone, $camera]) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $camera->nome }}" required>
        </div>
        <div class="mb-3">
            <label>URL do Feed</label>
            <input type="url" name="url" class="form-control" value="{{ $camera->url }}" required>
        </div>
        <button class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection
