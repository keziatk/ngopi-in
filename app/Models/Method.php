<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ratio',
        'grind_size',
        'temperature',
        'temperature_label',
        'brew_time',
        'brew_time_label',
        'steps',
    ];
    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'method_equipment');
    }

    public function coffees()
    {
        return $this->belongsToMany(Coffee::class, 'coffee_method');
    }
}
