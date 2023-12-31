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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->text('subject');
            $table->string('niveau');
            $table->text('programe');
            $table->dateTime('date');
            $table->string('images')->nullable();
            $table->string('video')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }

    
};
