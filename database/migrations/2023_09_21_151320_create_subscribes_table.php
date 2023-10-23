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
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email')->nullable();
            $table->string('profession')->nullable();
            $table->string('adresse')->nullable();
            $table->string('numero');
            
            $table->string('cv')->nullable();
            $table->unsignedBigInteger('offre_id');
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
            $table->boolean('traited')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribes');
    }
};
