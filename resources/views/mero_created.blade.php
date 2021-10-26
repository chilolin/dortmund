<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Select Chords</title>
    </head>
    <body>
        {{-- @dd($_GET) --}}
        {{-- @dd($merofreqs); --}}
        <? php $keys = [C4,D4,E4,F4,G4,A4,B4,C5] ?>
        <h1>Tutorial made by Positronx.io</h1>
        <table class="table table-bordered">
            <thead >
              <tr >
                <th scope="col">Key</th>
                <th scope="col" colspan="8">FM</th>
                <th scope="col" colspan="8">GM</th>
                <th scope="col" colspan="8">Em</th>
                <th scope="col" colspan="8">Am</th>
              </tr>
            </thead>
            <tbody>
                
                <th scope="row">C4</th>
                <?php
                    for ($i = 0; $i < 32; $i++) {
                    echo '<td></td>';
                    }
                ?>
              </tr>
              
            </tbody>
          </table>
    </body>
</html>
