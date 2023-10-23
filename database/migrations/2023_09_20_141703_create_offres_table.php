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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->text('titre');
            $table->text('description');
            $table->dateTime('debut_inscription');
            $table->dateTime('fin_inscription');
            $table->dateTime('debut_formation');
            $table->boolean('can_submit');
            $table->boolean('is_publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
