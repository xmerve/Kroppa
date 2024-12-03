<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function gamer()
    {
        return $this->belongsTo(Gamer::class);
    }
}
