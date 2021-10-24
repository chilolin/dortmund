<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at'
    ];

    public function chord()
    {
        return $this->belongsTo(Chord::class);
    }
}
