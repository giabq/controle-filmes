<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;


class Filme extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $with = ['personagens'];

    public function personagens()
    {
        return $this->hasMany(Personagens::class, 'filme_id');
    }


    protected static function booted(){
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('name');
        });
    }
}
