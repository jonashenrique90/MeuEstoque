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
  <div id="confirmModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">DELETAR PRODUTO </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tem certeza de que deseja deletar o Produto?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-danger">Deletar</button>
      </div>
    </div>
  </div>
</div>

@push('js')
  <script type="text/javascript" src="{{ asset('front/showModal.js')}}"></script>
@endpush
@endsection
