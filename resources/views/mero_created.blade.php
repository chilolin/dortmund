<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('/js/function-play-sound.js') }}"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Select Chords</title>
    </head>
    <body>
        {{-- @dd($_GET) --}}
        {{-- @dd($merofreqs); --}}
        {{-- @dd($chordProgressFreqs); --}}
        <?php
        $mero_array = json_encode($merofreqs);
        $chord_array = json_encode($chordProgressFreqs);
        // var_dump($mero_array);
        // var_dump($chord_array);
        // exit();

        ?>

        <script>
            let mero_array = <?php echo $mero_array; ?>;
            console.log(mero_array); 
            // PlayChord(mero_array,0.1);
        </script>

        <div class="container">
        <h3>Melody</h3>
        <table class="table-sm table-bordered">
            <thead >
              <tr >
                <th scope="col"></th>
                <th scope="col" colspan="8"><?php echo $chordProgKeys[0][0];?></th>
                <th scope="col" colspan="8"><?php echo $chordProgKeys[1][0];?></th>
                <th scope="col" colspan="8"><?php echo $chordProgKeys[2][0];?></th>
                <th scope="col" colspan="8"><?php echo $chordProgKeys[3][0];?></th>
              </tr>
            </thead>
            <tbody>
                <?php
                  foreach ($scores as $key => $val) {
                    $w=0;
                    while($w <=3){
                      $start = 8*$w;
                      $end = 8*($w+1)-1;
                      if (in_array(mb_ereg_replace('[^a-zA-Z]', '', $key),$chordProgKeys[$w])){
                        
                        $t = $start;
                        while ($t<=$end){
                          $val[$t] +=4;
                          $t++;
                        }
                      }
                      $w ++;
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
              </tr>
              
            </tbody>
          </table>
          <button onclick="PlayChord(mero_array,0.25);">Replay</button>
        </div>
        
    </body>
</html>
