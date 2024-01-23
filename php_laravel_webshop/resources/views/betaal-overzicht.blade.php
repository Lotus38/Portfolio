<!DOCTYPE html>
<html>
<body>
 <p> winkelwagen overzicht </p>

@if(empty(session("cart.$userId")))
    <div class="alert alert-info">
        Winkelwagen is leeg.
    </div>
@else
    
    <div class="alert alert-info">
        Winkelwagen<br>
    </div>

    @php
        $totaalprijs = 0;
    @endphp

    @foreach ($cart as $productId => $quantity)
        @php
            $product = \App\Models\Product::find($productId);
            $productTotaalPrijs = $quantity * $product->price;
            $totaalprijs += $productTotaalPrijs;
        @endphp
    
        <li>
            {{ \App\Models\Product::find($productId)->name }} - Aantal: {{ $quantity }} Totaalprijs: {{ $productTotaalPrijs }}€
        </li>
        @endforeach
        <br>
    Totaalprijs Winkelwagen: {{ $totaalprijs }}€


@endif

</body>

<form method="POST" action="{{route('afgerond')}}"> 
    @csrf
    @foreach ($cart as $productId => $quantity)
        <input type="hidden" name="cart[{{ $productId }}]" value="{{ $quantity }}">
    @endforeach
    <button type="submit">Betalen</button>
</form>