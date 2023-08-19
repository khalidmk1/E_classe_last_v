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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
             $table->foreignId('conversation_id')->unsigned();
            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
            $table->foreignId('sender_id')->unsigned();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->unsigned();
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('message');
            $table->integer("statue")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
