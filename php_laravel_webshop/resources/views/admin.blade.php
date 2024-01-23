<!DOCTYPE html>
<html>
<body>

<h1>hallo admin</h1>

<a href= "{{ route('neworders.show') }}">Bekijk Nieuwe Orders</a><br><br>
<a href= "{{ route('roles.show') }}">Bekijk Rollen Gebruikers</a><br><br>
<a href= "{{ route('product.terminal') }}">Beheer Producten</a><br><br>
<a href= "{{ route('log.in') }}">Naar Winkel</a><br><br>

<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>

</body>
</html>