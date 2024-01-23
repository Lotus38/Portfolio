<!DOCTYPE html>
<html>
<body>



    <h1> Producten Terminal </h1>

    <a href= "{{ route('update.products') }}">Beheer/Verwijder Bestaande Producten</a><br><br>
    <a href= "{{ route('product.add') }}">Voeg Product Toe</a><br><br>


    <br><a href= "{{ route('ad.page') }}">Terug Naar Admin Pagina</a><br><br>
    <form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>

</body>
</html>