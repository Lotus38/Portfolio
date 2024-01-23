<!DOCTYPE html>
<html>
<head>
    <title>Producten</title>
</head>


<ul>
@if(empty(session('cart.'.$userId)))
    <div class="alert alert-info">
        Winkelwagen is leeg.
    </div>
@else
    <div class="alert alert-info">
        Winkelwagen<br>
    </div>
    @foreach (session('cart.'.$userId) as $productId => $quantity)
    <li>
        {{ $products->find($productId)->name }} - Aantal: {{ $quantity }}
    </li>
    @endforeach
@endif

<form method="POST" action="{{ route('check.out') }}">
@csrf
<button type="submit">Ga naar afrekenen</button>
</form>
</ul>

<body>
<ul>
@foreach ($products as $product)
    <li>
    <form method="POST" action="{{ route('add.Cart') }}">
        @csrf
        @php
            $productInCart = session('cart.'.$userId)[$product->id] ?? 0;
        @endphp
        <label for="quantity_{{ $product->id }}">{{ $product->name}} €{{$product->price }}:<br></label>
        <select id="quantity_{{ $product->id }}" name="quantity[{{ $product->id }}]">
            @for ($i = 0; $i <= $product->stock - $productInCart; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <input type="hidden" name="product_id[{{ $product->id }}]" value="{{ $product->id }}">
        <button type="submit">Voeg Toe</button>
    </form>
    
    <form method="POST" action="{{ route('remove.Cart') }}">
        @csrf
        <label for="quantity_remove_{{ $product->id }}"></label>
        <select type="select" id="quantity_remove_{{ $product->id }}" name="quantity[{{ $product->id }}]">
            @php
                $cartQuantity = isset(session('cart.'.$userId)[$product->id]) ? session('cart.'.$userId)[$product->id] : 0;
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

    

</ul>

<br><br><a href= "{{ route('log.in') }}">Terug naar Welkomstpagina</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>
</body>
</html>