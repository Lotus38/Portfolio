<!DOCTYPE html>
<html>
<body>

@foreach ($orders as $order)
    <a href= "{{ route('show.ordered', ['order_id' => $order->id]) }}">Ordernummmer:   {{ $order->id }}</a><br>
    Klantnummer:    {{ $order->customer_id }}<br>
    Aangemaakt op:  {{ $order->created_at->format('Y-m-d H:i:s') }}<br><br>
@endforeach

<a href= "{{ route('ad.page') }}">Terug Naar Admin Pagina</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>
</body>
</html> 