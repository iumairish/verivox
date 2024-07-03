<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarrif', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', [1, 2]);
            $table->float('baseCost');
            $table->integer('includedKwh');
            $table->float('additionalKwhCost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarrif');
    }
};
