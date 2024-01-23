<h1>Orders</h1>

@foreach ($orders as $order)

    Ordernummer: <a href="{{ route( 'ordered.products', ['order' => $order->id]) }}">{{ $order->id }}</a><br><br>

@endforeach

<br><a href= "{{ route('klant.show') }}">Terug naar Klantpagina</a><br><br>
<a href= "{{ route('showProductpage') }}">Naar Winkel</a><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>