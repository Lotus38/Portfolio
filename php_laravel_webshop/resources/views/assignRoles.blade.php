<!DOCTYPE html>
<html>
<body>

@foreach ($users as $user)
       
    <a href= "{{ route('change.role', ['customer_id' => $user->id]) }}">{{ $user->id }} {{ $user->first_name }} Role: {{ $user->getRoleNames(); }}</a><br><br>

@endforeach

<br><br><a href= "{{ route('ad.page') }}">Terug Naar Admin Pagina</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>

</body>
</html>