<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrewHistory extends Model
{
    protected $fillable = [
        'user_id',
        'method_id',
        'coffee_gram',
        'water_ml',
        'ratio',
    ];
    public function method()
    {
        return $this->belongsTo(Method::class);
    }
}
