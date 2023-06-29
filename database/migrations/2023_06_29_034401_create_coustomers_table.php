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
        Schema::create('coustomers', function (Blueprint $table) {
            $table->id();
            $table->string('cous_code', 24);
            $table->string('cous_name', 124);
            $table->string('cous_email', 50)->nullable()->unique();
            $table->string('cous_phone', 20)->nullable()->unique();
            $table->string('cous_country')->nullable()->unique();
            $table->string('cous_address')->nullable()->unique();
            $table->string('cous_image')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coustomers');
    }
};
