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
        Schema::create('questioncategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status',['shown', 'notShown']);
            $table->integer('sequence')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questioncategories');
    }
};
