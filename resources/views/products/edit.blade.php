@extends('menu.menu')

@section('content')
<h1>Editar {{ $product->name }}</h1>
  <div class="row">
    <div class="col-md-3">
      <form action="{{ route('products.update', ['product' => $product]) }}" method="post">
        @method('PATCH')
        @include('products.form')
        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        @csrf
      </form>
    </div>
  </div>
  <hr>

@endsection
