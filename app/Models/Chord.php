<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chord extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at'
    ];

    /**
     * コード情報から関連するキーの情報を取得。
     *
     * @return
     */
    public static function getChordWithNotes(string $id) {
        $chord = self::find($id);
        return [
            'chordName' => $chord->name,
            'note1' => $chord->notes[0]->name,
            'note2' => $chord->notes[1]->name,
            'note3' => $chord->notes[2]->name,
        ];
    }
    

    public static function getChordWithNotesFreq(string $id) {
        $chord = self::find($id);
        return [
            'chordName' => $chord->name,
            'note1' => $chord->notes[0]->freq,
            'note2' => $chord->notes[1]->freq,
            'note3' => $chord->notes[2]->freq,
        ];
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }
}
