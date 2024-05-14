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
        Schema::create('home_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type')->comment('1 for Programs And Training, 2 for Voice Of Samriddha Gram, 3 for OurPartners');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_galleries');
    }
};
