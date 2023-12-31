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
        Schema::create('speedruns', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('info',500);
            $table->string('videoTitle');
            $table->string('videoLink');
            $table->integer('time_seconds');
            $table->string('game_version');
            $table->enum('status',['commited','accepted','rejected']);
            $table->enum('category',['any%','default settings']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speedruns');
    }
};
