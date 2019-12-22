<div class="form-group">
  <label for="name">Nome: </label>
  <input class="form-control" type="text" name="name" value="{{ old('name') ?? $product->name }}">
</div>
<div class="">
  @if ($errors->has('name'))
    <label class="error text-danger" for="name">{{ $errors->first('name') }}</label>
  @endif
</div>
<div class="form-group">
  <label for="quantity">Quantidade: </label>
  <input class="form-control" type="number" name="quantity" value="{{ old('quantity') ?? $product->quantity }}">
</div>
<div class="">
  @if ($errors->has('quantity'))
    <label class="error text-danger" for="quantity">{{ $errors->first('quantity') }}</label>
  @endif
</div>
<div class="form-group">
  <label for="description">Descrição: </label>
  <textarea name="description" rows="8" cols="80"> {{ old('description') ?? $product->description }} </textarea>
</div>
<div class="">
  @if ($errors->has('description'))
    <label class="error text-danger" for="description">{{ $errors->first('description') }}</label>
  @endif
</div>
<div class="form-group" hidden>
  <input type="text" name="user_id" value="{{ Auth()->user()->id}}">
</div>

@csrf
