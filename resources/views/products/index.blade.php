@extends('menu.menu')

@section('content')
    <div class="d-flex flex-row">
      <div class="p-2 col">
        <h2 class="text-center">Lista de Produtos</h2>
      </div>
      <div class="p-2">
        <a target="_blank" href="{{ route('products.print')}}">IMPRIMIR</a>
      </div>
    </div>
    <div class="list-group">
        @forelse ($products as $product)
          <a href="{{ route('products.show', ['product' => $product]) }}" class="list-group-item list-group-item-action">
            <div class="row">
              <div class="col-md-4">
              <p class="m-0"> <strong>Nome</strong> </p>
               {{ $product->name }}
              </div>
              <div class="col-md-4">
                <p class="m-0"> <strong>Quantidade</strong> </p>
                {{ $product->quantity }}
              </div>
              <div class="col-md-2 text-wrap text-break">
                <p class="m-0"> <strong>Descrição</strong> </p>
                {{ $product->description }}
              </div>
            </div>
          </a>
          <div class="m-1">

          </div>
        @empty
          <div class="col-md-12">
            <p>Nenhum Produto Cadastrado</p>
          </div>
        @endforelse
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center pt-4">
          {{ $products->links() }}
        </div>
    </div>
@endsection
