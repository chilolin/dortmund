<?php
    $mero_array = json_encode($merofreqs);
    $chord_array = json_encode($chordProgressFreqs);
    // var_dump($mero_array);
    // var_dump($chord_array);
    // exit();
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Scripts -->
        <script src="{{ asset('js/playSound.js') }}?v=(new Date()).getTime()" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>メロディ</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark">
            <div class="container">
                <div class="col">
                    <div class="text-center">
                        <a class="navbar-brand text-warning" href="/">Dortmund</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container p-3">
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
                        foreach($scores as $key => $val) {
                            for($i = 0; $i < 4; $i++) {
                                $start = 8 * $i;
                                $end = 8 * ($i + 1) - 1;
                                if (in_array(mb_ereg_replace('[0-9]', '', $key), $chordProgKeys[$i])) {
                                    $t = $start;
                                    while($t <= $end) {
                                        $val[$t] += 4;
                                        $t++;
                                    }
                                }
                            }

                            echo('<tr><th scope="row">'.$key.'</th>');

                            foreach($val as $timing) {
                                if ($timing == 0) {
                                    echo '<td></td>';
                                } elseif ($timing == 4) {
                                    echo '<td class="table-secondary"></td>';
                                } else {
                                    echo '<td class="table-dark"></td>';
                                }
                            }
                        }

                        echo('</tr>')
                    ?>
                </tbody>
            </table>

            <script>
                const mero_array = <?php echo $mero_array; ?>;
                const chord_array = <?php echo $chord_array; ?>;
            </script>
            <button class="btn btn-dark" onclick="playAccompany(mero_array, chord_array, 0.25);">Play</button>
            <button class="btn btn-dark" onclick="window.location.reload(true);">
                <i class="fa fa-refresh" aria-hidden="true"></i><span>Recreate</span>
            </button>
            <div class="text-right">
                <button class="btn btn-dark ml-auto" onclick="location.href='/'" >Return Chords Select</button>
            </div>
        </div>
    </body>
</html>
