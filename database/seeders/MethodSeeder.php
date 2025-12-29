<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Method;

class MethodSeeder extends Seeder
{
    public function run()
    {
        Method::insert([
            [
                'name' => 'V60 Pour Over',
                'ratio' => 15,
                'grind_size' => 'Medium-fine (mirip garam meja)',
                'temperature' => 93,
                'temperature_label' => '92–94 °C',
                'brew_time' => 210,
                'brew_time_label' => '3–3,5 menit',
                'steps' => "Panaskan air dan bilas filter.\nBlooming 30 detik (50 ml).\nTuang spiral sampai 300 ml.",
            ],
            [
                'name' => 'Aeropress',
                'ratio' => 12,
                'grind_size' => 'Fine',
                'temperature' => 85,
                'temperature_label' => '80–85 °C',
                'brew_time' => 120,
                'brew_time_label' => '2 menit',
                'steps' => 'Aduk 10 detik, press perlahan.',
            ],
            [
                'name' => 'French Press',
                'ratio' => 18,
                'grind_size' => 'Coarse',
                'temperature' => 94,
                'temperature_label' => '93–95 °C',
                'brew_time' => 240,
                'brew_time_label' => '4 menit',
                'steps' => 'Diamkan lalu tekan plunger perlahan.',
            ],
        ]);
    }
}
