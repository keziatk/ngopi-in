<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('methods', function (Blueprint $table) {
            $table->id();

            // DISPLAY (untuk UI)
            $table->string('name');
            $table->string('grind_size')->nullable();
            $table->string('temperature_label')->nullable(); // contoh: 92–94 °C
            $table->string('brew_time_label')->nullable();   // contoh: 3–3,5 menit
            $table->text('steps')->nullable();

            // CALCULATOR (NUMERIC)
            $table->integer('ratio');        // contoh: 15 untuk 1:15
            $table->integer('temperature');  // contoh: 93
            $table->integer('brew_time');    // detik, contoh: 210

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('methods');
    }
};
