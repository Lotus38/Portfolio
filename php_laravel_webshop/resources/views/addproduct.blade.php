<!DOCTYPE html>
<html>
<body>

@if (session('Toegevoegd'))
    <div class="alert alert-success">
        {{ session('Toegevoegd') }}
    </div>
@endif
<br>
<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Naam">
    <input type="text" name="price" placeholder="Prijs">
    <input type="text" name="stock" placeholder="Voorraad">
    <button type="submit">Product Toevoegen</button>
</form>

<br><br><a href= "{{ route('product.terminal') }}">Terug Naar Product Terminal</a><br><br>
<a href= "{{ route('ad.page') }}">Terug Naar Admin Pagina</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>

</body>
</html>