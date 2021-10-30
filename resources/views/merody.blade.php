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
        <div class="container">
            <h3>Melody</h3>
            <table class="table-sm table-bordered">
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
                                if (in_array(mb_ereg_replace('[^a-zA-Z]', '', $key), $chordProgKeys[$i])){
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
        </div>
    </body>
</html>
