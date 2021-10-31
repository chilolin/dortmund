<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chord;
use App\Models\Note;
use App\Library\Merody;

class ChordController extends Controller
{
    /**
     * 選択したコードからメロディを作成して、
     * メロディを流す画面に遷移する。
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function createMerodyBySelected(Request $request) {
        // バリデーション
        $request->validate([
            'firstChord' => 'required',
            'secondChord' => 'required',
            'thirdChord' => 'required',
            'forthChord' => 'required',
            'notes' => 'required',
            'smoothness' => 'required',
            'harmonious' => 'required',
        ]);

        // note付きのコード情報を取得
        $selectedChords = $request->only('firstChord', 'secondChord', 'thirdChord', 'forthChord');
        $chordProgress = array_map(
            function(string $chordId) {
                return Chord::getChordWithNotes($chordId);
            },
            $selectedChords
        );
        $chordProgressFreqs = array_map(
            function(string $chordId) {
                return Chord::getChordWithNotesFreq($chordId);
            },
            $selectedChords
        );

        // メロディを生成。
        $merody = new Merody($request->input('notes'));
        $createdMerody = $merody->create($chordProgress, $request->input('smoothness'), $request->input('harmonious'));

        // 遷移
        return view('merody', array(
            'scores' => $createdMerody['scores'],
            'merofreqs' => $createdMerody['merofreqs'],
            'chordProgNotes' => $createdMerody['chordProgNotes'],
            'chordProgressFreqs' => $chordProgressFreqs
        ));
    }
}
