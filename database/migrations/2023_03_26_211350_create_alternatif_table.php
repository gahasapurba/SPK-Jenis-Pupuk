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
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->string("nama_alternatif");
            $table->string("curah_hujan")->nullable();
            $table->string("jenis_tanah")->nullable();
            $table->integer("kandungan_n")->nullable();
            $table->integer("kandungan_p")->nullable();
            $table->integer("kandungan_k")->nullable();
            $table->bigInteger("harga")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif');
    }
};
