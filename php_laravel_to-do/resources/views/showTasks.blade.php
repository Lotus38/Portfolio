<!DOCTYPE html>
<html>

<a href="{{ route('showData') }}">Terug naar Taak Categoriën</a>

<head>
    <title>Taken</title>
</head>
<body>
    <ul>
        @foreach ($tasks as $item)
            <li>{{ $item->description }}
            <form method="POST" action="{{ route('task.update', [$item->id]) }}">
            @csrf
            @method('PUT')
            <label for="textbox"></label>
            <input type="text" id="upbox" name="upbox" value="{{$item->description}}">
            <button type="submit">Update</button>
            </form>
            <form method="POST" action="{{ route('task.delete', [$item->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
            </form>
            </li>
        @endforeach
    </ul>

    <h1>Taak Toevoegen</h1>

    <form method="POST" action="{{ route('add.task') }}">
        @csrf
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <label for="textbox"></label>
        <input type="text" id="textbox" name="textbox"><br>
        <button type="submit">Taak Toevoegen</button>
    </form>
    
</body>
</html>

