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
        Schema::create('home_intros', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('left_image');
            $table->string('left_url');
            $table->string('right_image');
            $table->string('right_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_intros');
    }
};
