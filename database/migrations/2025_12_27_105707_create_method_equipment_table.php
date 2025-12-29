<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('method_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('method_id')->constrained()->cascadeOnDelete();
            $table->foreignId('equipment_id')->constrained('equipment')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('method_equipment');
    }
};
