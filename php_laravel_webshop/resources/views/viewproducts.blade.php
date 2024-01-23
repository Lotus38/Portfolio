<!DOCTYPE html>
<html>
<body>

@foreach ($products as $product)
    <a href= "{{ route('change.product', ['id' => $product->id]) }}">Product: {{ $product->name }}<br> Voorraad: {{ $product->stock}}<br> Prijs: {{ $product->price }}</a><br><br>
@endforeach


<a href= "{{ route('product.terminal') }}">Terug naar Product Terminal</a><br><br>
<br><a href= "{{ route('ad.page') }}">Terug Naar Admin Pagina</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>

</body>
</html>