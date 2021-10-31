<?php
namespace App\Library;

use App\Models\Note;

class Merody {
    protected $noteList = [];

    /**
     * Create a new component instance.
     *
     * @param array $notes
     * @return void
     */
    public function __construct(array $notes)
    {
        $this->noteList = array_reduce(
            array_keys($notes),
            function (array $accumulator, int $notesIndex) use ($notes) {
                $noteName = Note::find($notes[$notesIndex])->name;
                return array_merge($accumulator, array($noteName => [3, $notesIndex]));
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
        $meronotes = [$this->selectNote($this->noteList)];
        $renewNoteList = [];
        $chordProgNotes =[];

        $w=0;
        foreach ($chordProgress as $chord) {
            $chordNotes = [];
            array_push(
                $chordNotes,
                mb_ereg_replace('[^a-zA-Z]', '', $chord['note1']),
                mb_ereg_replace('[^a-zA-Z]', '', $chord['note2']),
                mb_ereg_replace('[^a-zA-Z]', '', $chord['note3'])
            );

            for ($i = 0; $i < 8; $i++) {
                $base = $this->noteList[end($meronotes)][1];
                foreach ($this->noteList as $note => $val){
                    
                    // $newWeight = $smoothness * (14 - abs($val[1] - $base));
                    $newWeight = pow(14 - abs($val[1] - $base), $smoothness);
                    
                    if (in_array(mb_ereg_replace('[^a-zA-Z]', '', $note), $chordNotes)) {
                        $newWeight = $harmonious * $newWeight;
                    }
                    $addList = [$note => [$newWeight,$val[1]]];
                    $renewNoteList = array_merge($renewNoteList, $addList);
                }
                

                array_push(
                    $meronotes,
                    $this->selectNote($renewNoteList)
                );
            }

            $chordProgNotes = array_merge(
                $chordProgNotes,
                array($w => array_merge(
                    array($chord['chordName']),
                    $chordNotes
                ))
                
            );

            $w++;
        }


        array_shift($meronotes);
        $merofreqs = [];

        foreach($meronotes as $val){
            $freq = Note::where('name', $val)->value('freq');
            array_push($merofreqs, $freq);
        }
        $scores = $this->changeToScore($meronotes);

        return [
            'scores' => $scores,
            'merofreqs' => $merofreqs,
            'chordProgNotes' => $chordProgNotes
        ];

    }

    private function selectNote($noteList){
        $newnote = lcg_value() * $this->sumTotalWeight($noteList);
        $searchPosition =0.0;

        foreach ($noteList as $note => $val) {
            $searchPosition += $val[0];
            if ($newnote < $searchPosition){
                return $note;
            }
        }
    }

    private function sumTotalWeight($noteList){
        return array_sum((array_column($noteList, 0)));
    }

    private function changeToScore($meronotes){
        $score = [];
        $lowestnoteId = Note::where('name',array_key_first($this->noteList))->first()->id;
        $highestnoteId = Note::where('name',array_key_last($this->noteList))->first()->id;

        for ($i = $lowestnoteId; $i <= $highestnoteId; $i=$i+10) {
            
            $score = $score + array(Note::find($i)->name =>array_fill(0,32,0));
        }

        foreach($meronotes as $note => $val){
            $score[$val][$note] = 1;
        }
        $score = array_reverse($score);

        //ここからのuksort関数のコメントアウトは現状要らないが一応残している
        // uksort($score, function($note1,$note2){
        //     $pattern = '/[0-9]/';
        //     if(strpos($note1, 'A') !== false or strpos($note1, 'B') !== false){
        //         $note1 = preg_replace_callback($pattern, function ($m) {
        //             return ($m[0] + 1);
        //         }, $note1);
        //       }
        //     if(strpos($note2, 'A') !== false or strpos($note2, 'B') !== false){
        //         $note2 = preg_replace_callback($pattern, function ($m) {
        //             return ($m[0] + 1);
        //         }, $note2);
        //     }
        //     return strrev($note1) <strrev($note2);
        // } );

        return $score;
    }
}
