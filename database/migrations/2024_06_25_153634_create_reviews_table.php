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
        Schema::create('reviews', function (Blueprint $table) {
            $table->integerIncrements('ReviewID');
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedInteger('BookID');
            $table->foreign('BookID')->references('BookID')->on('Books')->cascadeOnDelete();
            $table->enum('Rating',['1','2','3','4','5']);
            $table->string('ReviewText');
            $table->date('ReviewDate'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
