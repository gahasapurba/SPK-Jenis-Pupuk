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
        Schema::create('quantitative_utilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternative_alternatives_id')->constrained('alternatives')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedDecimal('result', 12, 12);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quantitative_utilities');
    }
};
