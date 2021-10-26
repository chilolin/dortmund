<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chord extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at'
    ];

    public static function getAllChord() {
        return self::all();
    }

    // public function keys()
    // {
    //     return $this->hasMany(Key::class,'first_key_id');
    // }

    // public function getKeys()
    // {
    //     return $this
    //         ->keys()
    //         ->get();
    // }
    public function getFirstKey(){
        return $this->belongsTo(Key::class,'first_key_id');
    }

    // public function getSecondKey(){
    //     return $this->belongsTo(Key::class,'second_key_id');
    // }

    public function getSecondKey(){
        $chordKeys = DB::table('chords')
        ->leftJoin('keys', 'keys.id', '=', 'chords.second_key_id')
        ->get();
        return $chordKeys;
    }
     

}
