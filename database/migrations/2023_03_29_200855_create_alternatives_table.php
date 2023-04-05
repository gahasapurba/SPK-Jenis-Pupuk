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
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('rainfall')->nullable();
            $table->string('soil_type')->nullable();
            $table->unsignedInteger('nitrogen')->nullable();
            $table->unsignedInteger('phosphor')->nullable();
            $table->unsignedInteger('kalium')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatives');
    }
};
