<h1>Beantwoord de volgende vraag:</h1>

<form action="{{ route('checkAnswer') }}" method="POST">
    @csrf
    @foreach ($questions as $question)
        <p>{{ $question['vraag'] }}</p>
        <ul>
            <li>
                <label>
                    <input type="radio" name="answers[{{ $loop->index }}]" value="1">
                    {{ $question['a1'] }}
                </label>
            </li>
            <li>
                <label>
                    <input type="radio" name="answers[{{ $loop->index }}]" value="2">
                    {{ $question['a2'] }}
                </label>
            </li>
            <li>
                <label>
                    <input type="radio" name="answers[{{ $loop->index }}]" value="3">
                    {{ $question['a3'] }}
                </label>
            </li>
            <li>
                <label>
                    <input type="radio" name="answers[{{ $loop->index }}]" value="4">
                    {{ $question['a4'] }}
                </label>
            </li>
        </ul>
    @endforeach
    <button type="submit">Verzenden</button>
</form>

@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif