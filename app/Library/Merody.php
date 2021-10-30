<?php
namespace App\Library;

use App\Models\Key;

class Merody {

    protected static $keyList = [];

    /**
     * Create a new component instance.
     *
     * @param array $keys
     * @return void
     */
    // public function __construct($keys)
    // {
    //     $this->keyList = [];
    // }

    /**
     * メロディを作成する。
     *
     * @param array $chordProgress
     * @param array $keys
     * @param int $smoothness
     * @param float $harmonious
     * @return array
     */
    public static function create($chordProgress, $keys, $smoothness=30, $harmonious=3.3) {


        $z=0;
        foreach($keys as $val) {
            $key=Key::find($val);
            $addArray =  [$key->name =>[3,$z]];

            self::$keyList += $addArray;
            $z++;

        }


        $merokeys = [self::selectKey(self::$keyList)];
        $renewKeyList = [];
        $chordProgKeys =[];

        foreach ($chordProgress as $chord) {
            $w=0;
            $chordKeys = [];
            array_push(
                $chordKeys,
                mb_ereg_replace('[^a-zA-Z]', '', $chord['key1']),
                mb_ereg_replace('[^a-zA-Z]', '', $chord['key2']),
                mb_ereg_replace('[^a-zA-Z]', '', $chord['key3'])
            );

            for ($i = 0; $i < 8; $i++) {
                // dd(self::$KEY_LIST[end($merokeys)][1]);
                $base = self::$keyList[end($merokeys)][1];
                foreach (self::$keyList as $key => $val){
                    $newWeight = $smoothness * (14 - abs($val[1] - $base));
                    if (in_array(mb_ereg_replace('[^a-zA-Z]', '', $key), $chordKeys)) {
                        $newWeight = $harmonious * $newWeight;
                    }
                    $addList = [$key => [$newWeight,$val[1]]];
                    $renewKeyList = array_merge($renewKeyList, $addList);

                }


                array_push(
                    $merokeys,
                    self::selectKey($renewKeyList)
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
        $scores = self::changeToScore($merokeys);

        return [
            'scores' => $scores,
            'merofreqs' => $merofreqs,
            'chordProgKeys' => $chordProgKeys
        ];

    }

    private static function selectKey($keyList){
        $newkey = lcg_value() * self::sumTotalWeight($keyList);
        $searchPosition =0.0;

        foreach ($keyList as $key => $val) {
            $searchPosition += $val[0];
            if ($newkey < $searchPosition){
                return $key;
            }
        }
    }

    private static function sumTotalWeight($keyList){
        return array_sum((array_column($keyList, 0)));
    }

    private static function changeToScore($merokeys){
        $score = [];
        $lowestkeyId = Key::where('name',array_key_first(self::$keyList))->first()->id;
        $highestkeyId = Key::where('name',array_key_last(self::$keyList))->first()->id;

        for ($i = $lowestkeyId; $i <= $highestkeyId; $i++) {
            $score = $score + array(Key::find($i)->name =>array_fill(0,32,0));
        }

        foreach($merokeys as $key=>$val){
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
