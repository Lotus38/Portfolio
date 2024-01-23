<!DOCTYPE html>
<html>
<body>
 <p> winkelwagen overzicht </p>
<ul>
@if(empty(session('cart.'.$userId)))
    <div class="alert alert-info">
        Winkelwagen is leeg.<br>
        Klik op "Terug naar Productpagina" om producten toe te voegen.
    </div>
@else
    
    <div class="alert alert-info">
        Winkelwagen<br>
    </div>

    @php
        $totaalprijs = 0;
    @endphp

    @foreach (session('cart.'.$userId) as $productId => $quantity)
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



    @foreach (session('cart.'.$userId) as $productId => $quantity)
        @php
        $product = \App\Models\Product::find($productId);
        $productInCart = session('cart.'.$userId)[$productId] ?? 0; // Haal het aantal in de winkelwagen op of stel in op 0 als het niet bestaat
        @endphp
        <li>
        <form method="POST" action="{{ route('addcheck.Cart') }}">
            @csrf
            <label for="quantity_{{ $product->id }}">{{ $product->name}} €{{$product->price }}:<br></label>
            <select id="quantity_{{ $product->id }}" name="quantity[{{ $product->id }}]">
                @for ($i = 0; $i <= $product->stock - $productInCart; $i++) {{-- Verminder met het aantal in de winkelwagen --}}
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <input type="hidden" name="product_id[{{ $product->id }}]" value="{{ $product->id }}">
            <button type="submit">Voeg Toe</button>
        </form>

        <form method="POST" action="{{ route('removecheck.Cart') }}">
            @csrf
            <label for="quantity_remove_{{ $product->id }}"></label>
            <select type="select" id="quantity_remove_{{ $product->id }}" name="quantity[{{ $product->id }}]">
                @php
                    $cartQuantity = isset(session('cart.'.$userId)[$product->id]) ? session('cart.'.$userId)[$product->id] : 0
                @endphp
                @for ($i = 0; $i <= $cartQuantity; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit">Verwijder</button>
        </form>
        
        <br><br>
        </li>
        @endforeach

        <form method="POST" action="{{route('naar.betalen')}}"> 
        @csrf
        <button type="submit">Naar Betalen</button>
    </form>

@endif

</ul>
</body>
<a href= "{{ route('showProductpage') }}">Terug naar productpagina</a><br><br>
<a href= "{{ route('log.in') }}">Terug naar Welkomstpagina</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>
</html>