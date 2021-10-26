<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Select Chords</title>
    </head>
    <body>
        <form action="{{ route('merody') }}" method="GET">
            <label for="first-chord">Choose a first-chord:</label>
            <select name="first_chord" id="first-chord">
                <option value="">--Please choose an option--</option>
                @foreach($chords as $chord)
                        <option value="{{ $chord->id }}" @if (old('first_chord') == $chord->id) selected @endif>{{ $chord->name }}</option>
                @endforeach
            </select>
            @error('first_chord')
                <p>必ず指定してください。</p>
            @enderror

            <label for="second-chord">Choose a second-chord:</label>
            <select name="second_chord" id="second-chord">
                <option value="">--Please choose an option--</option>
                @foreach($chords as $chord)
                    <option value="{{ $chord->id }}" @if (old('second_chord') == $chord->id) selected @endif>{{ $chord->name }}</option>
                @endforeach
            </select>
            @error('second_chord')
                <p>必ず指定してください。</p>
            @enderror

            <label for="third-chord">Choose a third-chord:</label>
            <select name="third_chord" id="third-chord">
                <option value="">--Please choose an option--</option>
                @foreach($chords as $chord)
                    <option value="{{ $chord->id}}" @if (old('third_chord') == $chord->id) selected @endif>{{ $chord->name }}</option>
                @endforeach
            </select>
            @error('third_chord')
                <p>必ず指定してください。</p>
            @enderror

            <label for="forth-chord">Choose a forth-chord:</label>
            <select name="forth_chord" id="forth-chord">
                <option value="">--Please choose an option--</option>
                @foreach($chords as $chord)
                    <option value="{{ $chord->id }}" @if (old('forth_chord') == $chord->id) selected @endif>{{ $chord->name }}</option>
                @endforeach
            </select>
            @error('forth_chord')
                <p>必ず指定してください。</p>
            @enderror

            <button type="submit">コード決定</button>
        </form>
    </body>
</html>
