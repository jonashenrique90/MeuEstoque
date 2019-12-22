@extends('menu.menu')

@section('content')
<h1>Adicionar Produto</h1>
  <div class="row">
    <div class="col-md-3">
      <form action="/products" method="post">
        @include('products.form')
        <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
      </form>
    </div>
  </div>
  <hr>

@endsection
