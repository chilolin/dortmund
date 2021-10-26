
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Select Chords</title>
        <script src="{{ asset('/js/function-mero-create.js') }}"></script>
    </head>
    <body>
        {{-- @dd($_GET); --}}
        
        @dd($mero);
    </body>
</html>
