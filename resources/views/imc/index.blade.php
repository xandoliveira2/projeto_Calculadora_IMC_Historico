@extends('layouts.app')  <!-- Usaremos um layout básico para o site -->

@section('content')
<div class="container">
    <h1>Calculadora de IMC</h1>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulário para calcular o IMC -->
    <form action="{{ route('imc.calculate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="height">Altura (em metros)</label>
            <input type="number" step="0.01" name="height" id="height" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="weight">Peso (em kg)</label>
            <input type="number" step="0.1" name="weight" id="weight" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Calcular IMC</button>
    </form>

    <hr>

    <!-- Histórico de IMC -->
    <h2>Histórico de Cálculos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>IMC</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($calculations as $calculation)
                <tr>
                    <td>{{ $calculation->id }}</td>
                    <td>{{ $calculation->height }} m</td>
                    <td>{{ $calculation->weight }} kg</td>
                    <td>{{ number_format($calculation->bmi, 2) }}</td>
                    <td>
                        <form action="{{ route('imc.destroy', $calculation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum cálculo registrado ainda.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
