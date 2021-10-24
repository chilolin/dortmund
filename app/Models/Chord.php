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

    public function getAllChord() {
        return $this::all();
    }

    public function keys()
    {
        return $this->hasMany(Key::class);
    }

}
