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
        Schema::table('characteristics', function (Blueprint $table) {
            $table->string('type_diffuser')->nullable();
            $table->string('type_of_flavoring')->nullable();
            $table->string('diffuser_placement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('characteristics', function (Blueprint $table) {
            $table->dropColumn('type_diffuser');
            $table->dropColumn('type_of_flavoring');
            $table->dropColumn('diffuser_placement');
        });
    }
};
