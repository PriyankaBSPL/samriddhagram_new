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
        Schema::create('state_pages', function (Blueprint $table) {
            $table->id();
            $table->string('state_name');
            $table->string('number_of_training')->nullable();
            $table->string('number_of_trainee')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.   
     */
    public function down(): void
    {
        Schema::dropIfExists('state_pages');
    }
};
