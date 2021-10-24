<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use App\Models\Chord;

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
        // バリデーション
        $request->validate([
            'first_chord' => 'required',
            'second_chord' => 'required',
            'third_chord' => 'required',
            'forth_chord' => 'required',
        ]);

        return view('mero_created');
    }
}
