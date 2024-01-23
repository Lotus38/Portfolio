<!DOCTYPE html>
<html>
@if (session('betaling_gelukt'))
    <div class="alert alert-success">
        {{ session('betaling_gelukt') }}
    </div>
@endif
<body>

    <a href= "{{ route('showProductpage') }}">Naar Winkel</a><br><br>
    <a href= "{{ route('klant.show') }}">Naar Profiel</a><br><br>
<form method="post" action="{{ route('uitloggen') }}">
    @csrf
    <button type="submit">Uitloggen</button>
</form>

</body>
</html>