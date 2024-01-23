<!DOCTYPE html>
<html>
<head>
    <title>Klantgegevens</title>
</head>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<body>
    <h1>Klantgegevens</h1>

    <p>Klantnaam: {{ $klant->first_name }}</p>
    <p>Adres:   {{ $klant->city }}</p>

    <form method="POST" action="{{route('city')}}"> 
    @csrf
    <label for="first_name">Verander adres:<br></label>
    <input type="text" id="city" name="city" value="city">
    <br><button type="submit">Ok</button>
</form><br>
                
<a href= "{{ route('showOrders') }}">Bekijk Orders</a><br><br>
<a href= "{{ route('log.in') }}">Terug naar Welkomstpagina</a><br><br>
<a href= "{{ route('showProductpage') }}">Naar Winkel</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>
</body>
</html>