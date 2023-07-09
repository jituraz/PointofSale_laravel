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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('sup_code', 24)->unique();
            $table->string('sup_name', 124);
            $table->string('sup_email', 50)->unique();
            $table->string('sup_phone', 20)->unique();
            $table->string('sup_country');
            $table->string('sup_address')->nullable();
            $table->string('sup_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
