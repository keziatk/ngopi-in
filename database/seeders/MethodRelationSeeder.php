<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Method;
use App\Models\Equipment;
use App\Models\Coffee;

class MethodRelationSeeder extends Seeder
{
    public function run()
    {
        $v60 = Method::where('name', 'V60 Pour Over')->first();
        $aeropress = Method::where('name', 'Aeropress')->first();
        $french = Method::where('name', 'French Press')->first();

        $v60Dripper = Equipment::where('name', 'V60 Dripper')->first();
        $frenchPot = Equipment::where('name', 'French Press')->first();

        if ($v60 && $v60Dripper) {
            $v60->equipments()->syncWithoutDetaching([$v60Dripper->id]);
        }

        if ($french && $frenchPot) {
            $french->equipments()->syncWithoutDetaching([$frenchPot->id]);
        }

        // kalau kopi ada
        $arabica = Coffee::first();

        if ($arabica && $v60) {
            $v60->coffees()->syncWithoutDetaching([$arabica->id]);
        }
    }
}
