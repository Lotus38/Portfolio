<!DOCTYPE html>
<html>
<body>
    <h1>Productoverzicht van Order {{ $order->id }}</h1>

    @foreach ($orderedProducts as $orderedProduct)
        <p>{{ $orderedProduct->amount }}x {{ $orderedProduct->product->name }}</p>
    @endforeach

    <a href= "{{ route('neworders.show') }}">Terug Naar Order Overzicht </a><br><br>
    <a href= "{{ route('ad.page') }}">Terug Naar Admin Pagina</a><br><br>
    <form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>
</body>
</html>