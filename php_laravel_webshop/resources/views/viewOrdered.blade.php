<h1>Productoverzicht van Order {{ $order }}</h1>

@foreach ($orderedProducts as $orderedProduct)
    
    @php
        $product = \App\Models\Product::withTrashed()->find($orderedProduct->product_id);
    @endphp
    
    Naam: {{ $product->name }}<br>
    Aantal: {{ $orderedProduct->amount}}<br><br>

@endforeach

<a href= "{{ route('showOrders') }}">Terug naar Orders</a><br><br>
<a href= "{{ route('showProductpage') }}">Naar Winkel</a><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>