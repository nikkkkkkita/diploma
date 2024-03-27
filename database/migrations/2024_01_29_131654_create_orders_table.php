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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('contact_information_id')->constrained('contact_information')->cascadeOnDelete();
            $table->double('total')->default(0);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('patronymic')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
            // user_id: 1, product_id: 2, price: 100, qu: 1, status: paid
            // hasMany - belongsTo
            // hasOne - hasOne
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
