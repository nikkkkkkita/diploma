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
        Schema::create('characteristics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('country_of_manufacture')->nullable();
            $table->string('compound')->nullable();
            $table->string('material')->nullable();
            $table->double('height')->nullable();
            $table->double('volume')->nullable();
            $table->string('aroma')->nullable();
            $table->double('burning_time')->nullable();
            $table->string('wick_type')->nullable();
            $table->string('type')->nullable();
            $table->double('weight')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristics');
    }
};
