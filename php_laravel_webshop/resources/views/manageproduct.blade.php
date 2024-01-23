<!DOCTYPE html>
<html>
<body>

    Product:  {{ $product->name }}<br>
    Voorraad: {{ $product->stock}}<br>
    Prijs:    {{ $product->price}}<br>

    <h1>Product aanpassen</h1>
<form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}">
    @csrf
    @method('PATCH')
    <input type="text" name="name" value="{{ $product->name }}" placeholder="Nieuwe naam">
    <input type="text" name="price" value="{{ $product->price }}" placeholder="Nieuwe prijs">
    <input type="text" name="stock" value="{{ $product->stock }}" placeholder="Nieuwe voorraad">
    <button type="submit">Bijwerken</button>
</form>

<h1>Product verwijderen uit winkel</h1>
<form method="POST" action="{{ route('product.delete', ['product' => $product->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Verwijder Product</button>
</form>



<br><a href= "{{ route('update.products') }}">Terug Producten Overzicht</a><br><br>
<a href= "{{ route('product.terminal') }}">Terug naar Product Terminal</a><br><br>
<a href= "{{ route('ad.page') }}">Terug Naar Admin Pagina</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>

</body>
</html>