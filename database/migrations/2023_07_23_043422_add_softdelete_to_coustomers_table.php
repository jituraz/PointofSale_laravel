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
        Schema::table('coustomers', function (Blueprint $table) {
            $table->tinyInteger('cous_status')->after('cous_address')->default('1');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coustomers', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->tinyInteger('cous_status');
        });
    }
};
