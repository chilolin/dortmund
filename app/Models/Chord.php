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
    public static function getChordWithKeys(string $id) {
        $chord = self::find($id);
        return [
            'chordName' => $chord->name,
            'key1' => $chord->keys[0]->name,
            'key2' => $chord->keys[1]->name,
            'key3' => $chord->keys[2]->name,
        ];
    }

    public function keys()
    {
        return $this->belongsToMany(Key::class);
    }
}
