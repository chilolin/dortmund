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

    public function keys()
    {
        return $this->belongsToMany(Key::class);
    }
     

}
