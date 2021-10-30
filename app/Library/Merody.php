<?php
namespace App\Library;

use App\Models\Key;

class Merody {
    protected $keyList = [];

    /**
     * Create a new component instance.
     *
     * @param array $keys
     * @return void
     */
    public function __construct(array $keys)
    {
        $this->keyList = array_reduce(
            array_keys($keys),
            function (array $accumulator, int $keysIndex) use ($keys) {
                $keyName = Key::find($keys[$keysIndex])->name;
                return array_merge($accumulator, array($keyName => [3, $keysIndex]));
            },
            []
        );
    }

    /**
     * メロディを作成する。
     *
     * @param array $chordProgress
     * @param int $smoothness
     * @param float $harmonious
     * @return array
     */
    public function create(array $chordProgress, int $smoothness, float $harmonious) {
        $merokeys = [$this->selectKey($this->keyList)];
        $renewKeyList = [];
        $chordProgKeys =[];

        $w=0;
        foreach ($chordProgress as $chord) {
            $chordKeys = [];
            array_push(
                $chordKeys,
                mb_ereg_replace('[^a-zA-Z]', '', $chord['key1']),
                mb_ereg_replace('[^a-zA-Z]', '', $chord['key2']),
                mb_ereg_replace('[^a-zA-Z]', '', $chord['key3'])
            );

            for ($i = 0; $i < 8; $i++) {
                $base = $this->keyList[end($merokeys)][1];
                foreach ($this->keyList as $key => $val){
                    
                    // $newWeight = $smoothness * (14 - abs($val[1] - $base));
                    $newWeight = pow(14 - abs($val[1] - $base), $smoothness);
                    
                    if (in_array(mb_ereg_replace('[^a-zA-Z]', '', $key), $chordKeys)) {
                        $newWeight = $harmonious * $newWeight;
                    }
                    $addList = [$key => [$newWeight,$val[1]]];
                    $renewKeyList = array_merge($renewKeyList, $addList);
                }
                

                array_push(
                    $merokeys,
                    $this->selectKey($renewKeyList)
                );
            }

            $chordProgKeys = array_merge(
                $chordProgKeys,
                array($w => array_merge(
                    array($chord['chordName']),
                    $chordKeys
                ))
                
            );

            $w++;
        }


        array_shift($merokeys);
        $merofreqs = [];

        foreach($merokeys as $val){
            $freq = Key::where('name', $val)->value('freq');
            array_push($merofreqs, $freq);
        }
        $scores = $this->changeToScore($merokeys);

        return [
            'scores' => $scores,
            'merofreqs' => $merofreqs,
            'chordProgKeys' => $chordProgKeys
        ];

    }

    private function selectKey($keyList){
        $newkey = lcg_value() * $this->sumTotalWeight($keyList);
        $searchPosition =0.0;

        foreach ($keyList as $key => $val) {
            $searchPosition += $val[0];
            if ($newkey < $searchPosition){
                return $key;
            }
        }
    }

    private function sumTotalWeight($keyList){
        return array_sum((array_column($keyList, 0)));
    }

    private function changeToScore($merokeys){
        $score = [];
        $lowestkeyId = Key::where('name',array_key_first($this->keyList))->first()->id;
        $highestkeyId = Key::where('name',array_key_last($this->keyList))->first()->id;

        for ($i = $lowestkeyId; $i <= $highestkeyId; $i++) {
            $score = $score + array(Key::find($i)->name =>array_fill(0,32,0));
        }

        foreach($merokeys as $key => $val){
            $score[$val][$key] = 1;
        }
        $score = array_reverse($score);

        //ここからのuksort関数のコメントアウトは現状要らないが一応残している
        // uksort($score, function($key1,$key2){
        //     $pattern = '/[0-9]/';
        //     if(strpos($key1, 'A') !== false or strpos($key1, 'B') !== false){
        //         $key1 = preg_replace_callback($pattern, function ($m) {
        //             return ($m[0] + 1);
        //         }, $key1);
        //       }
        //     if(strpos($key2, 'A') !== false or strpos($key2, 'B') !== false){
        //         $key2 = preg_replace_callback($pattern, function ($m) {
        //             return ($m[0] + 1);
        //         }, $key2);
        //     }
        //     return strrev($key1) <strrev($key2);
        // } );

        return $score;
    }
}
