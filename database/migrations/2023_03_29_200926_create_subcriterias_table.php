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
        Schema::create('subcriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criteria_criterias_id')->constrained('criterias')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('variable');
            $table->unsignedInteger('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcriterias');
    }
};
