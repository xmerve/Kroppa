<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'gamer_id',
        'score',
    ];
    public function gamer()
    {
        return $this->belongsTo(Gamer::class);
    }
}
