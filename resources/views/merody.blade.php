<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/function-play-sound.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Select Chords</title>
    </head>
    <body>
        {{-- @dd($_GET) --}}
        {{-- @dd($merofreqs); --}}
        <?php
        $mero_array = json_encode($merofreqs);
        $chord_array = json_encode($chordProgressFreqs);
        // var_dump($mero_array);
        // var_dump($chord_array);
        // exit();

        ?>

        <script>
            let mero_array = <?php echo $mero_array; ?>;
            let chord_array = <?php echo $chord_array; ?>;
            console.log(mero_array);
            console.log(chord_array);
            // playAccompany(mero_array,chord_array,0.25);
        </script>

        <div class="container">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="/">Dortmund</a>
                </div>
            </nav>
            <h3>Melody</h3>
            <table class="table table-bordered">
                <thead >
                    <tr >
                        <th scope="col"></th>
                        @foreach ($chordProgKeys as $chordProgKey)
                            <th scope="col" colspan="8">{{ $chordProgKey[0] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($scores as $key => $val) {
                            for ($i = 0; $i < 4; $i++) {
                                $start = 8 * $i;
                                $end = 8 * ($i + 1) - 1;
                                if (in_array(mb_ereg_replace('[0-9]', '', $key), $chordProgKeys[$i])){
                                    $t = $start;
                                    while ($t<=$end){
                                        $val[$t] +=4;
                                        $t++;
                                    }
                                }
                            }

                            echo('<tr><th scope="row">'.$key.'</th>');

                            foreach($val as $timing){
                                if($timing == 0){
                                    echo '<td></td>';
                                }elseif($timing == 4){
                                    echo '<td class="table-secondary"></td>';
                                }
                                else{
                                    echo '<td class="table-dark"></td>';
                                }
                            }
                        }

                        echo('</tr>')
                    ?>
                </tbody>
            </table>

            <button onclick="playAccompany(mero_array,chord_array,0.25);">Replay</button>
        </div>
    </body>
</html>
