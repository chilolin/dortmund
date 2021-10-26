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
                'C4' => [3,1],
                'D4' => [3,2],
                'E4' => [3,3],
                'F4' => [3,4],
                'G4' => [3,5],
                'A4' => [3,6],
                'B4' => [3,7],
                'C5' => [3,8],
                'D5' => [3,9],
                'E5' => [3,10],
                'F5' => [3,11],
                'G5' => [3,12],
                'A5' => [3,13],
                'B5' => [3,14]
                ];
                
            $chord1 = Chord::find($chords['first_chord']);
            $chord2 = Chord::find($chords['second_chord']);
            $chord3 = Chord::find($chords['third_chord']);
            $chord4 = Chord::find($chords['forth_chord']);
            
            
         

            $ChordProgre = [
                [$chord1->name,$chord1->keys[0]->name, $chord1->keys[1]->name,$chord1->keys[2]->name],
                [$chord2->name,$chord2->keys[0]->name, $chord2->keys[1]->name,$chord2->keys[2]->name],
                [$chord3->name, $chord3->keys[0]->name, $chord3->keys[1]->name,$chord3->keys[2]->name],
                [$chord4->name, $chord4->keys[0]->name, $chord4->keys[1]->name,$chord4->keys[2]->name],
            ];

            

            
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
            
            foreach($ChordProgre as $val){
                $chordKeys = array();
                array_push($chordKeys,mb_ereg_replace('[^a-zA-Z]', '', $val[1]),mb_ereg_replace('[^a-zA-Z]', '', $val[2]));
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
            
            array_shift($merokeys);
            $merofreqs = [];

            foreach($merokeys as $val){
                $freq = Key::where('name',$val)->value('freq');
                array_push($merofreqs,$freq);
            }
            
            return [$merokeys,$merofreqs];
            
        }

        // バリデーション
        $request->validate([
            'first_chord' => 'required',
            'second_chord' => 'required',
            'third_chord' => 'required',
            'forth_chord' => 'required',
        ]);
        
        $mero = meroCreate($_GET);
        $merokeys = $mero[0];
        $merofreqs = $mero[1];

        return view('mero_created',compact('merokeys','merofreqs'));
  
    }

    
}
