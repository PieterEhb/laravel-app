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
        Schema::create('contactforms', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email');
            $table->string('message',250);
            $table->string('response')->nullable();
            $table->enum('status',['new','finished']);
            $table->integer('user_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactforms');
    }
};
