<!DOCTYPE html>
<html>
<head>
    <title>{{ config( 'app.name' ) }}</title>
</head>
<body>
    <h1>Welcome {{$name}} to the Laravel Webshop</h1>
</body>
<body>

    <a href= "{{ route('showProductpage') }}">Naar Winkel</a><br><br>
    <a href= "{{ route('klant.show') }}">Naar Profiel</a><br>
    <form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>
</body>
</html>