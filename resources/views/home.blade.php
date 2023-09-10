@extends('layouts.base')

@section('title', 'Generuj kod kreskowy')

@section('content')
<div class="mx-auto mt-5" style="width: 500px;">
    <h1>Generuj kod kreskowy</h1>
    <form action="{{ route('create') }}" method="POST"">
        @csrf
        <div class="form-group">
            <label for="nameCode">Nazwa kodu</label>
            <input type="text" class="form-control" name="nameCode" id="nameCode">
            <small class="form-text text-muted">Wpisz tutaj nazwę kodu który chcesz wygenerować</small>
        </div>
        <div>
            <label for="valueCode">Wartość kodu</label>
            <input type="text" class="form-control" name="valueCode" id="valueCode">
            <small class="form-text text-muted">Wpisz tutaj wartość kodu którą zapiszesz</small>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Generuj</button>
      </form>
</div>
@endsection
