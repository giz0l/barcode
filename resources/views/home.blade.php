@extends('layouts.base')

@section('title', 'Generuj kod kreskowy')

@section('content')
<div class="mx-auto mt-5" style="width: 500px;">
    <h1>Generuj kod kreskowy</h1>
    <form action="{{ route('create') }}" method="POST"">
        @csrf
        <div class="form-group">
            <label for="nameCode">Nazwa kodu</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="nameCode">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <small class="form-text text-muted">Wpisz tutaj nazwę kodu który chcesz wygenerować</small>
        </div>
        <div>
            <label for="valueCode">Wartość kodu</label>
            <input type="text" class="form-control @error('value') is-invalid @enderror" name="value" id="valueCode">
            @error('value')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <small class="form-text text-muted">Wpisz tutaj wartość kodu którą zapiszesz</small>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Generuj</button>
      </form>
</div>

<div class="mx-auto mt-5" style="width: 1200px;">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Wartość</th>
            <th scope="col">Kod</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($codes as $index => $code)
            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $code->name }}</td>
                <td>{{ $code->value }}</td>
                <td><img src="{{ $code->path }}" alt="barcode"/></td>
              </tr>
            @endforeach
        </tbody>
      </table>

</div>
@endsection
