<!DOCTYPE html>
<html>
<head>
    <title>Taak categoriën</title>
</head>
<body>
    <ul>
    @foreach ($data as $item)
    <li>
        <a href="{{ route('showTasks', [$item->id]) }}">{{ $item->name }}</a>
        <form method="POST" action="{{ route('task-category.update', [$item->id]) }}">
            @csrf
            @method('PUT')
            <label for="textbox"></label>
            <input type="text" id="upbox" name="upbox" value="{{$item->name}}">
            <button type="submit">Update</button>
        </form>
        <form method="POST" action="{{ route('task-category.delete', [$item->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach

    </ul>

    <h1>Categorie Toevoegen</h1>

    <form method="POST" action="{{ route('process.form') }}">
        @csrf
        <label for="textbox"></label>
        <input type="text" id="textbox" name="textbox"><br>
        <button type="submit">Categorie Toevoegen</button>
    </form>
</body>
</html>