<?php

$json_array = json_encode($merofreqs);
// var_dump($json_array);
// exit();


?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('/js/function-play-sound.js') }}"></script>

        <title>Select Chords</title>
    </head>

    <body>
        <script>
            let js_array = <?php echo $json_array; ?>;
            console.log(js_array); 
            PlayChord(js_array,0.1);
        </script>
        <button onclick="PlayChord(js_array,0.1);">Replay</button>
        <!-- {{-- @dd($_GET) --}} -->
        <!-- @dd($merofreqs); -->
    
        
        
        
        
        


        
    </body>
</html>
