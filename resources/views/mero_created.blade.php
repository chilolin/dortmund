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
                      // $w++;
                    }

                  }
                  
                  echo('</tr>')
                    
                ?>
              </tr>
              
            </tbody>
          </table>
        </div>
        
    </body>
</html>
