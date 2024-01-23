<!DOCTYPE html>
<html>
<body>
<h1>Pas rol aan voor {{ $user->first_name }}</h1><br>
<h1>Huidige Rol {{ $user->getRoleNames(); }}<br><br>

<form method="POST" action="{{ route('assign.role') }}">
    @csrf
    <input type="hidden" name="customer_id" value="{{ $user->id }}">
    
    <label>
        <input type="checkbox" name="roles[]" value="customer"> Klant Rol
    </label>
    <br>
    
    <label>
        <input type="checkbox" name="roles[]" value="admin"> Admin Rol
    </label>
    <br>
    
    <button type="submit">Opslaan</button>
</form>


<br><br><a href= "{{ route('roles.show') }}">Terug Klantenoverzicht</a><br><br>
<a href= "{{ route('ad.page') }}">Terug Naar Admin Pagina</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>
</body>
</html>