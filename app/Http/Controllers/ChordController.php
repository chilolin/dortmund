<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chord;
use App\Library\Merody;

class ChordController extends Controller
{
    /**
     * コードを全て渡す
     *
     * @return \Illuminate\Database\Eloquent\Collection<mixed, \App\Models\Chord>
     */
    public function getAll() {
        $chords = Chord::all();
        return $chords;
    }

    public function showAll() {
        $chords = Chord::all();
        return view('select_chords', [
            'chords' => $chords
        ]);
    }

    public function createMerodyBySelected(Request $request) {
        // バリデーション
        $request->validate([
            'first_chord' => 'required',
            'second_chord' => 'required',
            'third_chord' => 'required',
            'forth_chord' => 'required',
        ]);

        // key付きのコード情報を取得
        $selectedChords = $request->query->all();
        $chordProgress = array_map(
            function(string $chordId) {
                return Chord::getChordWithKeys($chordId);
            },
            $selectedChords
        );

        $chordProgressFreqs = array_map(
            function(string $chordId) {
                return Chord::getChordWithKeysFreq($chordId);
            },
            $selectedChords
        );
        

        // メロディを生成。
        $merody = Merody::create($chordProgress);
        $scores = $merody['scores'];
        $merofreqs = $merody['merofreqs'];
        $chordProgKeys = $merody['chordProgKeys'];
     

        return view('mero_created', compact('scores', 'merofreqs','chordProgKeys','chordProgressFreqs'));
    }
}
