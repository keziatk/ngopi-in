<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'origin',
        'process',
        'roast_level',
        'flavor_notes',
        'description',
        'image',
    ];
    public function methods()
    {
        return $this->belongsToMany(Method::class, 'coffee_method');
    }

    // 🔥 OPSI TERPUSAT
    public static function processes()
    {
        return [
            'Washed',
            'Natural',
            'Honey',
            'Semi-Washed',
            'Anaerobic',
        ];
    }

    public static function roastLevels()
    {
        return [
            'Light',
            'Medium',
            'Medium-Dark',
            'Dark',
        ];
    }
}
