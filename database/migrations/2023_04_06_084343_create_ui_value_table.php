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
        Schema::create('ui_value', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_alternatives")->constrained("alternatives")->onUpdate("cascade")->onDelete("cascade");
            $table->unsignedDecimal('spk_results');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ui_value');
    }
};
