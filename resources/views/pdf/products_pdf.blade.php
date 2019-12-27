<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
@include('pdf.style')
<title>{{ $title }} </title>
</head>
<body>
  <h1 class="simple-text">{{ $heading }} </h1>
  <hr>
  <div class="">
    <p> <strong>Usuário: </strong>{{ $user->name }}</p>
    <p> <strong>Data: </strong> {{ $date }} às {{ $hour }} horas</p>
    <p><strong>Total de Produtos: </strong>{{ @sizeof($products) }}</p>
    <section>
      <h4 class="text-center">Lista de Produtos</h4>
      <table class="table table-hover">
        <tr>
          <th>{{ __('Nome') }}</th>
          <th>{{ __('Quantidade') }}</th>
          <th>{{ __('Descrição') }}</th>
        </tr>
        @foreach($products as $product)
          <tr>
            <td scope="row">
              {{ $product->name }}
            </td>
            <td scope="row">
              {{ $product->quantity }}
            </td>
            <td scope="row">
              {{ $product->description }}
            </td>
          </tr>
        @endforeach
      </table>
      {{-- <h4 class="text-right">Total: {{ __('R$50,00')}}</h4> --}}
      <hr>
    </section>

  </div>
</body>
</body>
</html>
