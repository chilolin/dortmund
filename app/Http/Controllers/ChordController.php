<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use App\Models\Chord;
use App\Models\Key;
use Faker\Guesser\Name;

class ChordController extends Controller
{
    /**
     * コードを全て渡す
     *
     * @return \Illuminate\Database\Eloquent\Collection<mixed, \App\Models\Chord>
     */
    public function getAll() {
        $chords = Chord::getAllChord();
        return $chords;
    }

    public function showAll() {
        $chords = Chord::getAllChord();
        return view('select_chords', [
            'chords' => $chords
        ]);
    }

    
    


    public function validateSelected(Request $request) {
        

        function meroCreate($chords){
            $KeyList =[
                'C5' => [3,1],
                'D5' => [3,2],
                'E5' => [3,3],
                'F5' => [3,4],
                'G5' => [3,5],
                'A5' => [3,6],
                'B5' => [3,7],
                'C6' => [3,8],
                'D6' => [3,9],
                'E6' => [3,10],
                'F6' => [3,11],
                'G6' => [3,12],
                'A6' => [3,13],
                'B6' => [3,14]
                ];
                
            // $ChordProgre = [
            //     'FM' => ['A4','C5','F5'],
            //     'GM' => ['G4','B4','D5'],
            //     'Em' => ['G4','B4','E5'],
            //     'Am' => ['A4','C5','E5']
            //     ];
            // $ChordProgre = [
            //     $chords["first_chord"] => 
            $chord1 = Chord::find($chords['first_chord']);
            $chord2 = Chord::find($chords['second_chord']);
            $chord3 = Chord::find($chords['third_chord']);
            $chord4 = Chord::find($chords['forth_chord']);

            $ChordProgre = [];
            // logger($chord1);

            ///////////////////////ここから
            // $addChord = [$chord1[name] => [$chord1->keys]];

            
            
            
            function totalWeight($list){
                return array_sum((array_column($list, 0)));
            };
            
            function selectKey($list){
                $newkey = lcg_value() * totalWeight($list);
                $searchPosition =0.0;
                
                foreach($list as $key =>$val){
                    $searchPosition += $val[0];
                    if ($newkey < $searchPosition){
                        return $key;
                    }
                }
                
            }
            
            $merokeys = array();
            array_push($merokeys,selectKey($KeyList)) ;
            
            
            
            $KeyListRenew = array();
            foreach($ChordProgre as $key =>$val){
                $chordKeys = array();
                array_push($chordKeys,mb_ereg_replace('[^a-zA-Z]', '', $val[0]),mb_ereg_replace('[^a-zA-Z]', '', $val[1]),mb_ereg_replace('[^a-zA-Z]', '', $val[2]));
                $i = 0;
                
                while ($i < 8) {
                    $i++;
                    $base = $KeyList[end($merokeys)][1];
                    foreach ($KeyList as $key =>$val){
                        $newWeight = 30*(14- abs($val[1]-$base));
                        if (in_array(mb_ereg_replace('[^a-zA-Z]', '', $key),$chordKeys)){
                            $newWeight = 3.3*$newWeight;
                        }
                        $addList = [$key => [$newWeight,$val[1]]];
                        $KeyListRenew=array_merge($KeyListRenew,$addList);
                        
                    }
                    array_push($merokeys,selectKey($KeyListRenew));
                }
                
            }
            
            dd($chord2->getSecondKey());
            // return $chord1;
            
        }

        // バリデーション
        $request->validate([
            'first_chord' => 'required',
            'second_chord' => 'required',
            'third_chord' => 'required',
            'forth_chord' => 'required',
        ]);
        
        $mero = meroCreate($_GET);
        // return view('mero_created',compact('mero'));
        
        // return view('mero_created');
        // return view('mero_created',compact('keys'));
    }

    
}
