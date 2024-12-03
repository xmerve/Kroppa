<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gamer extends Model
{
    protected $fillable = [
        'email',
        'name',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
