<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Select Chords</title>
    </head>
    <body>
        <div class="container">
            <form action="{{ route('merody') }}" method="GET" class="needs-validation" novalidate>
                <div class="row">
                    <x-chord-selector id="first-chord" name="firstChord" chords="{{ $chords }}" />
                    <x-chord-selector id="second-chord" name="secondChord" chords="{{ $chords }}" />
                    <x-chord-selector id="third-chord" name="thirdChord" chords="{{ $chords }}" />
                    <x-chord-selector id="forth-chord" name="forthChord" chords="{{ $chords }}" />
                </div>

                <x-range-slider min="1" max="100" name="smoothness" />
                <x-range-slider min="1" max="20" step="0.1" name="harmonious" />

                <div>
                    <button class="btn btn-primary" type="submit">コード決定</button>
                </div>
            </form>
        </div>
    </body>
</html>
