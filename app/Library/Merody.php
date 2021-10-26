<?php
namespace App\Library;

use App\Models\Key;

class Merody {
    protected static $KEY_LIST = [
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

    public static function create($chordProgress) {
        $merokeys = [self::selectKey(self::$KEY_LIST)];
        $renewKeyList = [];

        foreach ($chordProgress as $chord) {
            $chordKeys = [];
            array_push(
                $chordKeys,
                mb_ereg_replace('[^a-zA-Z]', '', $chord['key1']),
                mb_ereg_replace('[^a-zA-Z]', '', $chord['key2'])
            );

            for ($i = 0; $i < 8; $i++) {
                $base = self::$KEY_LIST[end($merokeys)][1];
                foreach (self::$KEY_LIST as $key => $val){
                    $newWeight = 30*(14- abs($val[1] - $base));
                    if (in_array(mb_ereg_replace('[^a-zA-Z]', '', $key), $chordKeys)) {
                        $newWeight = 3.3 * $newWeight;
                    }
                    $addList = [$key => [$newWeight,$val[1]]];
                    $renewKeyList = array_merge($renewKeyList, $addList);
                }

                array_push(
                    $merokeys,
                    self::selectKey($renewKeyList)
                );
            }
        }

        array_shift($merokeys);
        $merofreqs = [];

        foreach($merokeys as $val){
            $freq = Key::where('name', $val)->value('freq');
            array_push($merofreqs, $freq);
        }

        return [
            'merokeys' => $merokeys,
            'merofreqs' => $merofreqs
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
}
