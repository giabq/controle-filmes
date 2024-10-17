<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atores extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    public $timestamps = false;

    public function personagens(){
        return $this->hasOne(Personagens::class);
    }
}
