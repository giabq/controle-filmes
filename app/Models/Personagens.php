<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personagens extends Model
{
    use HasFactory;

    protected $fillable = ['number'];

    public function filme()
    {
        return $this->belongsTo(Filme::class);
    }

    public function atores()
    {
        return $this->belongsTo(Atores::class);
    }
}
