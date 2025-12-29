<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('coffee_method', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coffee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('method_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coffee_method');
    }
};
