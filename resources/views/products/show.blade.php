@extends('menu.menu')

@section('content')

<h1 class="title">Produto: {{ $product->name}} </h1>
<h4 class="text-secondary"> <strong>Quantidade : </strong> {{ $product->quantity }}</h4>
<h4 class="text-secondary"> <strong>Descrição : </strong> {{ $product->description }}</h4>

  <div class="d-flex ">
    <div class="d-inline m-1">
      <a href="{{ route('products.edit', ['product' => $product]) }}">
          <button class="btn btn-info" type="button" >EDITAR</button>
      </a>
    </div>
    <div class="d-inline m-1">
      <form class="" action="{{ route('products.destroy', ['product' => $product]) }}" method="post">
        @method('delete')
        @csrf
        <button class="btn btn-danger" type="submit">DELETAR</button>
      </form>
    </div>
  </div>
@endsection
