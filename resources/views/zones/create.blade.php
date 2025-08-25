@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Zona</h1>

    <form method="POST" action="{{ route('zones.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>GPS</label>
            <input type="text" name="gps" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Risco</label>
            <select name="risco" class="form-control" required>
                <option value="baixo">Baixo</option>
                <option value="médio">Médio</option>
                <option value="alto">Alto</option>
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
